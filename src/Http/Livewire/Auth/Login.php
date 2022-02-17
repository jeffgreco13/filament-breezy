<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use Filament\Http\Livewire\Auth\Login as FilamentLogin;
use Illuminate\Contracts\View\View;
use Filament\Http\Livewire\Concerns\CanNotify;

class Login extends FilamentLogin
{
    use CanNotify;

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
