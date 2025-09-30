<?php

namespace Jeffgreco13\FilamentBreezy\Models;

use Crypt;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Jeffgreco13\FilamentBreezy\Events\LoginSuccess;
use Jeffgreco13\FilamentBreezy\Models\Scopes\PanelScope;

class BreezySession extends Model
{
    protected $guarded = [];

    protected $casts = [
        'two_factor_secret' => 'encrypted',
        'two_factor_recovery_codes' => 'encrypted:array',
        'two_factor_confirmed_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (?Model $model) {
            $model->panel_id = $model->panel_id ?? Filament::getCurrentOrDefaultPanel()->getId();
        });

        if (filament('filament-breezy')->scopeTwoFactorAuthenticationToPanel()) {
            static::addGlobalScope(new PanelScope);
        }
    }

    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }

    public function confirm(): void
    {
        event(new LoginSuccess($this->authenticatable));

        $this->update([
            'two_factor_confirmed_at' => now(),
        ]);
    }

    public function setSession(): void
    {
        session(['breezy_session_id' => md5($this->id)]);
    }

    public function isEnabled(): Attribute
    {
        return Attribute::make(
            get: fn () => ! is_null($this->two_factor_secret)
        );
    }

    public function isConfirmed(): Attribute
    {
        return Attribute::make(
            get: fn () => ! is_null($this->two_factor_secret) && ! is_null($this->two_factor_confirmed_at)
        );
    }

    public function isValid(): Attribute
    {
        return Attribute::make(
            get: fn () => session()->has('breezy_session_id') && session('breezy_session_id') == md5($this->id)
        );
    }

    public function getTwoFactorSecretAttribute($value): ?string
    {
        return $this->decryptLegacy($value);
    }

    public function getTwoFactorRecoveryCodesAttribute($value): ?array
    {
        return json_decode($this->decryptLegacy($value), true);
    }

    protected function decryptLegacy($value): ?string
    {
        if ($value === null) {
            return null;
        }

        $decrypted = Crypt::decryptString($value);

        // Fallback: decrypt old value (with serialization)
        if (is_string($decrypted) && preg_match('/^s:\d+:"/', $decrypted)) {
            $unserialized = @unserialize($decrypted);
            if ($unserialized !== false || $decrypted === 'b:0;') {
                return $unserialized;
            }
        }

        return $decrypted;
    }
}
