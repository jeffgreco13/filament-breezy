<?php

namespace Jeffgreco13\FilamentBreezy\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Jeffgreco13\FilamentBreezy\Models\Passkey;

class PasskeyUsedToAuthenticate
{
    use Dispatchable;

    public function __construct(
        public Passkey $passkey,
    ) {}
}
