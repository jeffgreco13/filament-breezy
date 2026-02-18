<?php

namespace Jeffgreco13\FilamentBreezy\Listeners;

use Illuminate\Contracts\Auth\Authenticatable;
use Jeffgreco13\FilamentBreezy\Events\PasskeyUsedToAuthenticate;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;

class SkipTwoFactorAfterPasskeyAuthentication
{
    public function handle(PasskeyUsedToAuthenticate $event): void
    {
        if (! filament('filament-breezy')->twoFactorAuthenticationEnabled()) {
            return;
        }

        /** @var Authenticatable&TwoFactorAuthenticatable $authenticatable */
        $authenticatable = $event->passkey->authenticatable;

        if ($authenticatable->hasEnabledTwoFactor()) {
            $authenticatable->confirmTwoFactorAuthentication();
        }
    }
}
