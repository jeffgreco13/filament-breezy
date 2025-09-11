<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Jeffgreco13\FilamentBreezy\Actions\PasswordButtonAction;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class TwoFactorAuthentication extends MyProfileComponent
{
    protected string $view = 'filament-breezy::livewire.two-factor-authentication';

    /**
     * @var Authenticatable&TwoFactorAuthenticatable
     */
    public $user;

    public bool $showRecoveryCodes = false;

    public static $sort = 30;

    public function mount(): void
    {
        $this->user = Filament::getCurrentOrDefaultPanel()->auth()->user();
    }

    public function enableAction(): Action
    {
        return PasswordButtonAction::make('enable')
            ->label(__('filament-breezy::default.profile.2fa.actions.enable'))
            ->action(function () {
                $this->user->enableTwoFactorAuthentication();
                Notification::make()
                    ->success()
                    ->title(__('filament-breezy::default.profile.2fa.enabled.notify'))
                    ->send();
            });
    }

    public function disableAction(): Action
    {
        return PasswordButtonAction::make('disable')
            ->label(__('filament-breezy::default.profile.2fa.actions.disable'))
            ->color('danger')
            ->requiresConfirmation()
            ->action(function () {
                $this->user->disableTwoFactorAuthentication();
                Notification::make()
                    ->warning()
                    ->title(__('filament-breezy::default.profile.2fa.disabling.notify'))
                    ->send();
            });
    }

    public function confirmAction(): Action
    {
        return Action::make('confirm')
            ->color('success')
            ->label(__('filament-breezy::default.profile.2fa.actions.confirm_finish'))
            ->modalSubmitActionLabel(__('filament-breezy::default.profile.2fa.actions.confirm'))
            ->modalWidth('sm')
            ->schema([
                TextInput::make('code')
                    ->label(__('filament-breezy::default.fields.2fa_code'))
                    ->placeholder('###-###')
                    ->required(),
            ])
            ->action(function ($data, $action, $livewire) {
                if (! filament('filament-breezy')->verify(code: $data['code'])) {
                    $livewire->addError('mountedActionsData.0.code', __('filament-breezy::default.profile.2fa.confirmation.invalid_code'));
                    $action->halt();
                }
                $this->user->confirmTwoFactorAuthentication();
                $this->user->setTwoFactorSession();
                Notification::make()
                    ->success()
                    ->title(__('filament-breezy::default.profile.2fa.confirmation.success_notification'))
                    ->send();
            });
    }

    public function regenerateCodesAction(): Action
    {
        return PasswordButtonAction::make('regenerateCodes')
            ->label(__('filament-breezy::default.profile.2fa.actions.regenerate_codes'))
            ->requiresConfirmation()
            ->action(function () {
                // These needs to regenerate the codes, then show the section.
                $this->user->reGenerateRecoveryCodes();
                $this->showRecoveryCodes = true;
                Notification::make()
                    ->success()
                    ->title(__('filament-breezy::default.profile.2fa.regenerate_codes.notify'))
                    ->send();
            });

    }

    public function getTwoFactorSecretProperty(): string
    {
        return $this->user->breezySession?->two_factor_secret ?? '';
    }

    public function getRecoveryCodesProperty(): Collection
    {
        return collect($this->user->breezySession?->two_factor_recovery_codes ?? []);
    }

    public function getTwoFactorQrCode(): string
    {
        return filament('filament-breezy')->getTwoFactorQrCodeSvg($this->user->getTwoFactorQrCodeUrl());
    }

    public function toggleRecoveryCodes(): void
    {
        $this->showRecoveryCodes = ! $this->showRecoveryCodes;
    }

    public function showRequiresTwoFactorAlert(): bool
    {
        return filament('filament-breezy')->shouldForceTwoFactor();
    }
}
