<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use Filament\Forms;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $name;
    public $email;
    public $password;
    public $password_confirm;

    protected $messages = [
        "email.unique" =>
            "An account with this email already exists. Please login.",
    ];

    public function mount(): void
    {
        //
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("name")->required(),
            Forms\Components\TextInput::make("email")
                ->required()
                ->email()
                ->unique(table: config('filament-breezy.user_model')),
            Forms\Components\TextInput::make("password")
                ->required()
                ->password()
                ->rules(config('filament-breezy.password_rules')),
            Forms\Components\TextInput::make("password_confirm")
                ->required()
                ->password()
                ->same("password"),
        ];
    }

    protected function prepareModelData($data): array
    {
        $preparedData = [
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
        ];

        return $preparedData;
    }

    public function register()
    {
        $preparedData = $this->prepareModelData($this->form->getState());

        $user = config('filament-breezy.user_model')::create($preparedData);

        event(new Registered($user));
        Auth::login($user, true);

        return redirect()->to(config("filament-breezy.register_redirect_url"));
    }

    public function render(): View
    {
        $view = view("filament-breezy::register");

        $view->layout("filament::components.layouts.base", [
            "title" => __("filament-breezy::default.registration.title"),
        ]);

        return $view;
    }
}
