<?php

namespace JeffGreco13\FilamentBreezy\Traits;

use Filament\Forms;
use Filament\Pages\Actions\Action;
use Filament\Pages\Actions\ButtonAction;
use JeffGreco13\FilamentBreezy\Actions\PasswordButtonAction;
use JeffGreco13\FilamentBreezy\FilamentBreezy;

trait HasBreezyTwoFactor
{
    protected $breezy;
    // Two Factor
    public $twofactor_code;
    public $showing_two_factor_recovery_codes = false;
    //public $showing_two_factor_qr = true;

    public function bootHasBreezyTwoFactor()
    {
        $this->breezy = app(FilamentBreezy::class);
    }

    public function enableTwoFactor()
    {
        $this->user->enableTwoFactorAuthentication($this->breezy);
    }

    public function disableTwoFactor()
    {
        $this->user->disableTwoFactorAuthentication();
        $this->notify('warning', 'Two factor authentication has been disabled.');
    }

    public function twoFactorQrCode()
    {
        return $this->user->twoFactorQrCodeSvg($this->breezy);
    }

    public function toggleRecoveryCodes()
    {
        $this->showing_two_factor_recovery_codes = ! $this->showing_two_factor_recovery_codes;
    }

    public function reGenerateRecoveryCodes()
    {
        $this->user->reGenerateRecoveryCodes();
        $this->notify('success', 'Recovery codes regenerated.');
    }

    public function confirmTwoFactor()
    {
        if (
            empty($this->user->two_factor_secret) ||
            empty($this->twofactor_code) ||
            ! $this->user->verifyTwoFactor($this->twofactor_code, $this->breezy)
        ) {
            $this->addError('twofactor_code', __('filament-breezy::default.profile.2fa.confirmation.invalid_code'));

            return;
        }
        $this->user->forceFill([
            'two_factor_confirmed_at' => now(),
        ])->save();
        $this->notify('success', __('filament-breezy::default.profile.2fa.confirmation.success_notification'));
        $this->showing_two_factor_recovery_codes = true;
    }

    protected function getHiddenActions(): array
    {
        if (config('filament-breezy.enable_2fa')) {
            return [
                PasswordButtonAction::make('enable2fa')->label(__('filament-breezy::default.profile.2fa.actions.enable'))->action('enableTwoFactor')->icon('heroicon-s-shield-check'),
                ButtonAction::make('regenerate2fa')->label(__('filament-breezy::default.profile.2fa.actions.regenerate_codes'))->icon('heroicon-o-refresh')->requiresConfirmation()->action('reGenerateRecoveryCodes'),
                PasswordButtonAction::make('disable2fa')->label(__('filament-breezy::default.profile.2fa.actions.disable'))->color('danger')->action('disableTwoFactor'),
            ];
        } else {
            return [];
        }
    }

    public function getCachedAction(string $name): ?Action
    {
        if ($action = parent::getCachedAction($name)) {
            return $action;
        }

        foreach ($this->getHiddenActions() as $action) {
            if ($name === $action->getName()) {
                return $action->livewire($this);
            }
        }

        return null;
    }

    protected function getConfirmTwoFactorFormSchema()
    {
        return [
            Forms\Components\TextInput::make('twofactor_code')
                ->label(__('filament-breezy::default.fields.2fa_code'))
                ->disableLabel()
                ->placeholder(__('filament-breezy::default.fields.2fa_code'))
                ->rules('nullable|string'),
        ];
    }
}
