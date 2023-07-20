<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use Filament\Forms;
use Filament\Notifications\Actions\Action as NotificationAction;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use JeffGreco13\FilamentBreezy\FilamentBreezy;
use Livewire\Component;

class ResetPassword extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $email;
    public $token;
    public $password;
    public $password_confirm;
    public bool $isResetting = false;
    public bool $hasBeenSent = false;

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
                    ->rules(app(FilamentBreezy::class)->getPasswordRules()),
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
            $response = Password::broker(config('filament-breezy.reset_broker', config('auth.defaults.passwords')))->reset([
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
                Notification::make()->title(__("filament-breezy::default.reset_password.notification_error"))->persistent()->actions([NotificationAction::make('resetAgain')->label(__("filament-breezy::default.reset_password.notification_error_link_text"))->url(route(config('filament-breezy.route_group_prefix').'password.request'))])->danger()->send();
            }
        } else {
            $response = Password::broker(config('filament-breezy.reset_broker', config('auth.defaults.passwords')))->sendResetLink(['email' => $this->email]);
            if ($response == Password::RESET_LINK_SENT) {
                Notification::make()->title(__("filament-breezy::default.reset_password.notification_success"))->success()->send();

                $this->hasBeenSent = true;
            } else {
                Notification::make()->title(match ($response) {
                    "passwords.throttled" => __("passwords.throttled"),
                    "passwords.user" => __("passwords.user")
                })->danger()->send();
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
