<?php

namespace JeffGreco13\FilamentBreezy\Actions;

use Filament\Pages\Actions\ButtonAction;
use Filament\Forms;

class PasswordButtonAction extends ButtonAction
{
    protected function setUp(): void
    {
        if ((time() - session('auth.password_confirmed_at', 0)) < config('filament-breezy.password_confirmation_seconds')){
            // Password confirmation is still valid
            //
        } else {
            $this->requiresConfirmation()
                ->modalHeading("Confirm password")
                ->modalSubheading(
                    "Please confirm your password to complete this action."
                )
                ->form([
                    Forms\Components\TextInput::make("current_password")
                        ->required()
                        ->password()
                        ->rule("current_password"),
                ]);
        }
    }

    public function call(array $data = [])
    {
        session(['auth.password_confirmed_at' => time()]);
        parent::call($data);
    }
}
