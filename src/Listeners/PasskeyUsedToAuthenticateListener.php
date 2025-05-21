<?php

namespace Jeffgreco13\FilamentBreezy\Listeners;

use Spatie\LaravelPasskeys\Events\PasskeyUsedToAuthenticateEvent;
use Jeffgreco13\FilamentBreezy\Models\BreezySession;

class PasskeyUsedToAuthenticateListener
{
    public function handle(PasskeyUsedToAuthenticateEvent $event): void
    {
        $authenticatableId = $event->passkey->get('authenticatable_id')[0]['authenticatable_id'] ?? null;
        if (!$authenticatableId) {
            return;
        }

        $session = BreezySession::where('authenticatable_id', $authenticatableId)
            ->latest()
            ->first();

        if ($session) {
            $session->setSession();
        }
    }
}
