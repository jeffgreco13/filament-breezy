<?php

namespace JeffGreco13\FilamentBreezy\Actions;

use Filament\Forms;
use Filament\Pages\Actions\ButtonAction;

class PasswordButtonAction extends ButtonAction
{
    protected function isPasswordSessionValid()
    {
        return (session()->has('auth.password_confirmed_at') && (time() - session('auth.password_confirmed_at', 0)) < config('filament-breezy.password_confirmation_seconds'));
    }

    protected function setUp(): void
    {
        if ($this->isPasswordSessionValid()) {
            // Password confirmation is still valid
            //
        } else {
            $this->requiresConfirmation()
                ->modalHeading(__('filament-breezy::default.password_confirm.heading'))
                ->modalSubheading(
                    __('filament-breezy::default.password_confirm.description')
                )
                ->form([
                    Forms\Components\TextInput::make("current_password")
                        ->label(__('filament-breezy::default.password_confirm.current_password'))
                        ->required()
                        ->password()
                        ->rule("current_password"),
                ]);
        }
    }

    public function call(array $data = [])
    {
        // If the session already has a cookie and it's still valid, we don't want to reset the time on it.
        if ($this->isPasswordSessionValid()) {
        } else {
            session(['auth.password_confirmed_at' => time()]);
        }

        parent::call($data);
    }
}
