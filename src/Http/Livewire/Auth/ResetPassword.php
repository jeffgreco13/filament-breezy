<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use Filament\Forms;
use Filament\Http\Livewire\Concerns\CanNotify;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Component;

class ResetPassword extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use CanNotify;

    public $email;
    public $token;
    public $password;
    public $password_confirm;
    public bool $isResetting = false;
    public bool $hasBeenSent = false;

    public function booted() : void
    {
        if(! config('filament-breezy.enable_reset_password', true)) {
            redirect(config('filament.home_url', '/'));

            return;
        }
    }

    public function mount($token = null): void
    {
        if (! is_null($token)) {
            // Verify that the token is valid before moving further.
            $this->email = request()->query('email', '');
            $this->token = $token;
            $this->isResetting = true;
        }
    }

    protected function getFormSchema(): array
    {
        if ($this->isResetting) {
            return [
                Forms\Components\TextInput::make("password")
                    ->label(__("filament-breezy::default.fields.password"))
                    ->required()
                    ->password()
                    ->rules(config("filament-breezy.password_rules")),
                Forms\Components\TextInput::make("password_confirm")
                    ->label(__("filament-breezy::default.fields.password_confirm"))
                    ->required()
                    ->password()
                    ->same("password"),
            ];
        } else {
            return [
                Forms\Components\TextInput::make("email")
                    ->label(__("filament-breezy::default.fields.email"))
                    ->required()
                    ->email()
                    ->exists(table: config('filament-breezy.user_model')),
            ];
        }
    }

    public function submit()
    {
        $data = $this->form->getState();

        if ($this->isResetting) {
            $response = Password::reset([
                'token' => $this->token,
                'email' => $this->email,
                'password' => $data['password'],
            ], function ($user, $password) {
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            });

            if ($response == Password::PASSWORD_RESET) {
                return redirect(route('filament.auth.login', ['email' => $this->email,'reset' => true]));
            } else {
                $this->notify('danger', __("filament-breezy::default.reset_password.notification_error"));
            }
        } else {
            $response = Password::sendResetLink(['email' => $this->email]);
            if ($response == Password::RESET_LINK_SENT) {
                $this->notify('success', __("filament-breezy::default.reset_password.notification_success"));

                $this->hasBeenSent = true;
            } else {
                $this->notify('danger', match ($response) {
                    "passwords.throttled" => __("passwords.throttled"),
                    "passwords.user" => __("passwords.user")
                });
            }
        }
    }

    public function render(): View
    {
        $view = view("filament-breezy::reset-password");

        $view->layout("filament::components.layouts.base", [
            "title" => __("filament-breezy::default.reset_password.title"),
        ]);

        return $view;
    }
}
