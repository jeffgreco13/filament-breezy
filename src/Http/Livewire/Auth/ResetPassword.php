<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use Filament\Forms;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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
        if (!is_null($token)){
            // Verify that the token is valid before moving further.
            $this->email = request()->query('email', '');
            $this->token = $token;
            $this->isResetting = true;
        }
    }

    protected function getFormSchema(): array
    {
        if ($this->isResetting){
            return [
                Forms\Components\TextInput::make("password")
                    ->required()
                    ->password()
                    ->rules(config("filament-breezy.password_rules")),
                Forms\Components\TextInput::make("password_confirm")
                    ->required()
                    ->password()
                    ->same("password"),
            ];
        } else {
            return [
                Forms\Components\TextInput::make("email")
                    ->required()
                    ->email()
                    ->exists(table: config('filament-breezy.user_model'))
            ];
        }
    }

    public function submit()
    {
        $data = $this->form->getState();

        if ($this->isResetting){
            $response = Password::reset([
                'token'=>$this->token,
                'email'=>$this->email,
                'password'=>$data['password'],
            ],function($user,$password){
                $user->password = Hash::make($password);
                $user->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            });

            if ($response == Password::PASSWORD_RESET) {
                return redirect(route('filament.auth.login',['email'=>$this->email,'reset'=>true]));
            } else {
                session()->flash("notify", [
                    "status" => "danger",
                    "message" => "Error: please try again later.",
                ]);
            }

        } else {
            $response = Password::sendResetLink(['email' => $this->email]);
            if ($response == Password::RESET_LINK_SENT){
                session()->flash("notify", [
                    "status" => "success",
                    "message" => "Check your inbox for instructions.",
                ]);
                $this->hasBeenSent = true;
            } else {
                session()->flash("notify", [
                    "status" => "danger",
                    "message" => match($response){
                        "passwords.throttled" => "Please wait before trying again.",
                        "passwords.user" => "User with this email not found."
                    },
                ]);
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
