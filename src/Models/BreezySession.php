<?php

namespace Jeffgreco13\FilamentBreezy\Models;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Jeffgreco13\FilamentBreezy\Events\LoginSuccess;

class BreezySession extends Model
{
    protected $guarded = [
        //
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        // Come back to this.
        // static::addGlobalScope('panel', function (Builder $builder) {
        //     $builder->where('panel_id', Filament::getCurrentPanel()->getId())->where('guard',Filament::getCurrentPanel()->getAuthGuard());
        // });

        static::creating(function (?Model $model) {
            // $model->guard = $model->guard ?? Filament::getCurrentPanel()->getAuthGuard();
            // $model->panel_id = $model->panel_id ?? Filament::getCurrentPanel()->getId();
        });
    }

    // public function scopePanel(Builder $query, string $value): void
    // {
    //     $query->where('panel_id',$value);
    // }

    // public function scopeGuard(Builder $query, string $value): void
    // {
    //     $query->where('guard', $panel_id);
    // }

    protected function userAgent()
    {
        return substr((string) request()->header('User-Agent'), 0, 500);
    }

    protected function ipAddress()
    {
        return request()->ip();
    }

    public function authenticatable()
    {
        return $this->morphTo();
    }

    public function confirm()
    {
        event(new LoginSuccess($this->authenticatable));

        $this->update([
            'two_factor_confirmed_at' => now(),
        ]);
    }

    public function expire()
    {
        $this->update([
            'expires_at' => now()->subMinutes(1),
        ]);
    }

    public function setSession(?int $lifetime = null)
    {
        session(['breezy_session_id' => md5($this->id)]);
        // $this->update([
        //     'expires_at' => now()->addSeconds($lifetime ?? filament('filament-breezy')->getTwoFactorSessionLifetime())
        // ]);
        // PLUS
        // $this->update([
        //     'ip_address' => $this->ipAddress(),
        //     'user_agent' => $this->userAgent(),
        //     'expires_at' => now()->addSeconds($lifetime ?? filament('filament-breezy')->getTwoFactorSessionLifetime())
        // ]);
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
        // return Attribute::make(
        //     get: fn () => !is_null($this->expires_at) && now()->lte($this->expires_at)
        // );
        // PLUS:
        // return Attribute::make(
        //     get: fn () => $this->userAgent() == $this->user_agent && $this->ipAddress() == $this->ip_address && !is_null($this->expires_at) && now()->lte($this->expires_at)
        // );
    }
}
