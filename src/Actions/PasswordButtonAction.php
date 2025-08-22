<?php

namespace Jeffgreco13\FilamentBreezy\Actions;

use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;

class PasswordButtonAction extends Action
{
    protected function isPasswordSessionValid(): bool
    {
        return session()->has('auth.password_confirmed_at') && (time() - session('auth.password_confirmed_at', 0)) < config('auth.password_timeout');
    }

    protected function setUp(): void
    {
        // session()->forget('auth.password_confirmed_at');
        parent::setUp();
        if (! $this->isPasswordSessionValid()) {
            // Require password confirmation
            $this->requiresConfirmation()
                ->modalHeading(__('filament-breezy::default.password_confirm.heading'))
                ->modalDescription(
                    __('filament-breezy::default.password_confirm.description')
                )
                ->schema([
                    TextInput::make('current_password')
                        ->label(__('filament-breezy::default.password_confirm.current_password'))
                        ->required()
                        ->password()
                        ->rule('current_password'),
                ]);
        }
    }

    public function call(array $parameters = []): mixed
    {
        // If the session already has a cookie and it's still valid, we don't want to reset the time on it.
        if (! $this->isPasswordSessionValid()) {
            session(['auth.password_confirmed_at' => time()]);
        }

        return parent::call($parameters);
    }
}
