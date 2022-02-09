<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire\Auth;

use Filament\Http\Livewire\Auth\Login as FilamentLogin;
use Illuminate\Contracts\View\View;

class Login extends FilamentLogin
{
    public function mount(): void
    {
        parent::mount();
        if ($email = request()->query("email", "")) {
            $this->form->fill(["email" => $email]);
        }
        if (request()->query("reset")) {
            session()->flash("notify", [
                "status" => "success",
                "message" => __("passwords.reset"),
            ]);
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
