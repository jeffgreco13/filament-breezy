<?php

namespace Jeffgreco13\FilamentBreezy\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Jeffgreco13\FilamentBreezy\Models\BreezySession;

trait TwoFactorAuthenticatable
{
    public static function bootTwoFactorAuthenticatable(): void
    {
        static::deleting(function ($model) {
            $model->breezySessions()->get()->each->delete();
        });
    }

    public function breezySessions(): MorphMany
    {
        return $this->morphMany(BreezySession::class, 'authenticatable');
    }

    public function breezySession(): MorphOne
    {
        return $this->breezySessions()->one()->ofMany();
    }

    public function hasEnabledTwoFactor(): bool
    {
        return $this->breezySession?->is_enabled ?? false;
    }

    public function hasConfirmedTwoFactor(): bool
    {
        return $this->breezySession?->is_confirmed ?? false;
    }

    public function enableTwoFactorAuthentication(): void
    {
        $twoFactorData = [
            'two_factor_secret' => filament('filament-breezy')->getEngine()->generateSecretKey(),
            'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
        ];
        if ($this->breezySession) {
            $this->disableTwoFactorAuthentication(); // Delete the session if it exists.
        }
        $this->breezySessions()->create($twoFactorData);
        $this->load(['breezySessions', 'breezySession']);
    }

    public function disableTwoFactorAuthentication(): void
    {
        $this->breezySession?->delete();
        $this->load(['breezySessions', 'breezySession']);
    }

    public function confirmTwoFactorAuthentication(): void
    {
        $this->breezySession?->confirm();
        $this->setTwoFactorSession();
    }

    public function setTwoFactorSession(): void
    {
        $this->breezySession->setSession();
    }

    public function hasValidTwoFactorSession(): bool
    {
        return $this->breezySession?->is_valid ?? false;
    }

    public function generateRecoveryCodes(): array
    {
        return Collection::times(8, function () {
            return Str::random(10).'-'.Str::random(10);
        })->all();
    }

    public function destroyRecoveryCode(string $recoveryCode): void
    {
        $unusedCodes = array_filter($this->breezySession?->two_factor_recovery_codes ?? [], fn ($code) => $code !== $recoveryCode);

        $this->breezySession->forceFill([
            'two_factor_recovery_codes' => $unusedCodes ?: null,
        ])->save();
    }

    public function getTwoFactorQrCodeUrl(): string
    {
        return filament('filament-breezy')->getQrCodeUrl(
            config('app.name'),
            $this->email,
            $this->breezySession->two_factor_secret,
        );
    }

    public function reGenerateRecoveryCodes(): void
    {
        $this->breezySession->forceFill([
            'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
        ])->save();
    }
}
