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

class Login extends FilamentLogin
{
    use CanNotify;

    public function authenticate(): ?LoginResponse
    {
        $data = $this->form->getState();

        // login field
        $fieldType = config('filament-breezy.fallback_login_field') == 'email' ? 'email' : 'login';
        // user column
        $loginColumn = filter_var($data[$fieldType], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            $this->addError($fieldType, __('filament::login.messages.throttled', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]));

            return null;
        }

        if (! Filament::auth()->attempt([
            $loginColumn => $data[$fieldType],
            'password' => $data['password'],
        ], $data['remember'])) {
            $this->addError($fieldType, __('filament::login.messages.failed'));

            return null;
        }

        return app(LoginResponse::class);
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
        $view = view("filament-breezy::login");

        /*
         * Livewire uses a macro for the `layout()` method.
         *
         * @phpstan-ignore-next-line
         */
        $view->layout("filament::components.layouts.base", [
            "title" => __("filament::login.title"),
        ]);

        return $view;
    }
}
