<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Http\Livewire\Auth\Login as FilamentLogin;
use Filament\Http\Livewire\Concerns\CanNotify;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Illuminate\Contracts\View\View;
use JeffGreco13\FilamentBreezy\FilamentBreezy;

class Login extends FilamentLogin
{
    use CanNotify;

    public $fieldType, $loginColumn, $showCodeForm = false, $usingRecoveryCode = false, $code, $user;

    public function toggleRecoveryCode()
    {
        $this->resetErrorBag('code');
        $this->code = null;
        $this->usingRecoveryCode = !$this->usingRecoveryCode;
    }

    public function hasValidCode()
    {
        if ($this->usingRecoveryCode){
            return $this->code && collect($this->user->recoveryCodes())->first(function ($code) {
                return hash_equals($this->code, $code) ? $code : false;
            });
        } else {
            return $this->code && app(FilamentBreezy::class)->verify(decrypt($this->user->two_factor_secret),$this->code);
        }
    }

    public function doRateLimit()
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError($this->fieldType, __('filament::login.messages.throttled', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]));

            return null;
        }
    }

    public function authenticate(): ?LoginResponse
    {
        // Form data
        $data = $this->showCodeForm ? $this->twoFactorForm->getState() : $this->form->getState();

        // login field
        $this->fieldType = config('filament-breezy.fallback_login_field') == 'email' ? 'email' : 'login';
        // user column
        if (isset($data[$this->fieldType])){
            $this->loginColumn = filter_var($data[$this->fieldType], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        }

        if (config('filament-breezy.enable_2fa')){

            if ($this->showCodeForm){
                // Verify the code, then attempt to log them in now.
                if (!$this->hasValidCode()){
                    $this->addError('code', __('filament-breezy::default.profile.2fa.confirmation.invalid_code'));
                    return null;
                }
                Filament::auth()->login($this->user,$this->remember);
                return app(LoginResponse::class);
            } else {
                // Validate the user's login details in order to show them the code challenge.
                $this->doRateLimit();

                $model = Filament::auth()->getProvider()->getModel();
                $this->user = $model::where($this->loginColumn,$data[$this->fieldType])->first();

                // If the user hasn't setup 2FA, authenticate and exit early.
                if (!$this->user->has_confirmed_two_factor){
                    // THIS is where we can force 2fa...
                    return $this->attemptAuth($data);
                }

                if (!$this->user || ! Filament::auth()->getProvider()->validateCredentials($this->user, ['password' => $data['password']])){
                    $this->addError($this->fieldType, __('filament::login.messages.failed'));
                    return null;
                }

                $this->password = null;
                $this->showCodeForm = true;
                return null;
            }

        } else {
            $this->doRateLimit();
            return $this->attemptAuth($data);
        }
    }

    protected function attemptAuth($data)
    {
        // ->attempt will actually log the person in, then the response sends them to the dashboard. We need to catch the auth, show the code prompt, then log them in.
        if (! Filament::auth()->attempt([
            $this->loginColumn => $data[$this->fieldType],
            'password' => $data['password'],
        ], $data['remember'])) {
            $this->addError($this->fieldType, __('filament::login.messages.failed'));

            return null;
        }

        return app(LoginResponse::class);
    }

    protected function getForms(): array
    {
        return array_merge(parent::getForms(), [
            "twoFactorForm" => $this->makeForm()->schema(
                $this->getTwoFactorFormSchema()
            ),
        ]);
    }

    protected function getTwoFactorFormSchema(): array
    {
        return [
            TextInput::make('code')
                ->label($this->usingRecoveryCode ? __('filament-breezy::default.fields.2fa_recovery_code') : __('filament-breezy::default.fields.2fa_code'))
                ->placeholder($this->usingRecoveryCode ? __('filament-breezy::default.two_factor.recovery_code_placeholder') : __('filament-breezy::default.two_factor.code_placeholder') )->required(),
        ];
    }

    protected function getFormSchema(): array
    {
        return config('filament-breezy.fallback_login_field') == 'email' ?
        parent::getFormSchema() : [
            TextInput::make('login')
            ->label(__('filament-breezy::default.fields.login'))
            ->required()
            ->autocomplete(),
            TextInput::make('password')
            ->label(__('filament::login.fields.password.label'))
            ->password()
                ->required(),
            Checkbox::make('remember')
            ->label(__('filament::login.fields.remember.label')),
        ];
    }

    public function mount(): void
    {
        parent::mount();
        if ($email = request()->query("email", "")) {
            $this->form->fill(["email" => $email]);
        }
        if (request()->query("reset")) {
            $this->notify("success", __("passwords.reset"), true);
        }
    }

    public function render(): View
    {
        $view = view($this->showCodeForm?"filament-breezy::two-factor":"filament-breezy::login");

        $view->layout("filament::components.layouts.base", [
            "title" => __("filament::login.title"),
        ]);

        return $view;
    }
}
