<?php

namespace Jeffgreco13\FilamentBreezy\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Jeffgreco13\FilamentBreezy\Models\BreezySession;

/**
 * @mixin \App\Models\User|\Illuminate\Foundation\Auth\User
 */
trait TwoFactorAuthenticatable
{
    public static function bootTwoFactorAuthenticatable(): void
    {
        static::deleting(static function (Model $model): void {
            $model->breezySessions()->get()->each->delete();
        });
    }

    public function initializeTwoFactorAuthenticatable(): void
    {
        $this->with[] = 'breezySessions';
    }

    public function breezySessions(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(BreezySession::class, 'authenticatable');
    }

    public function breezySession(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->breezySessions()->latest()->first()
        );
    }

    public function hasEnabledTwoFactor(): bool
    {
        return $this->breezy_session?->is_enabled ?? false;
    }

    public function hasConfirmedTwoFactor(): bool
    {
        return $this->breezy_session?->is_confirmed ?? false;
    }

    public function twoFactorRecoveryCodes(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->breezy_session ?
                json_decode(
                    decrypt($this->breezy_session->two_factor_recovery_codes),
                    true
                ) : null
        );
    }

    public function twoFactorSecret(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->breezy_session?->two_factor_secret
        );
    }

    public function enableTwoFactorAuthentication(): void
    {
        $twoFactorData = [
            'two_factor_secret' => encrypt(filament('filament-breezy')->getEngine()->generateSecretKey()),
            'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
        ];
        if ($this->breezy_session) {
            $this->disableTwoFactorAuthentication(); // Delete the session if it exists.
        }
        $this->breezy_session = $this->breezySessions()->create($twoFactorData);
        $this->load('breezySessions');
    }

    public function disableTwoFactorAuthentication(): void
    {
        $this->breezy_session?->delete();
    }

    public function confirmTwoFactorAuthentication(): void
    {
        $this->breezy_session?->confirm();
        $this->setTwoFactorSession();
    }

    public function setTwoFactorSession(?int $lifetime = null): void
    {
        $this->breezy_session->setSession($lifetime);
    }

    public function hasValidTwoFactorSession(): bool
    {
        return $this->breezy_session?->is_valid ?? false;
    }

    public function generateRecoveryCodes(): string
    {
        return encrypt(
            json_encode(
                Collection::times(8, static fn() => Str::random(10) . '-' . Str::random(10))->all()
            )
        );
    }

    public function getTwoFactorQrCodeUrl()
    {
        return filament('filament-breezy')->getQrCodeUrl(
            config('app.name'),
            $this->email,
            decrypt($this->breezy_session->two_factor_secret)
        );
    }

    public function reGenerateRecoveryCodes(): static
    {
        $this->breezy_session->forceFill([
            'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
        ])->save();

        return $this;
    }
}
