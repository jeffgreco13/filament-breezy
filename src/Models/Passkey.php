<?php

namespace Jeffgreco13\FilamentBreezy\Models;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Jeffgreco13\FilamentBreezy\Models\Scopes\PanelScope;
use Webauthn\PublicKeyCredentialSource;

class Passkey extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'data',
    ];

    protected $casts = [
        'last_used_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::creating(function (?Model $model) {
            $model->panel_id = $model->panel_id ?? Filament::getCurrentOrDefaultPanel()->getId();
        });

        if (filament('filament-breezy')->scopePasskeysToPanel()) {
            static::addGlobalScope(new PanelScope);
        }
    }

    public function data(): Attribute
    {
        $serializer = filament('filament-breezy')->passkeySerializer();

        return new Attribute(
            get: fn (string $value) => $serializer->deserialize(
                $value,
                PublicKeyCredentialSource::class,
                'json',
            ),
            set: fn (mixed $value) => [
                'credential_id' => mb_convert_encoding($value->publicKeyCredentialId, 'UTF-8'),
                'data' => $serializer->serialize($value, 'json'),
            ],
        );
    }

    public function authenticatable(): MorphTo
    {
        return $this->morphTo();
    }
}
