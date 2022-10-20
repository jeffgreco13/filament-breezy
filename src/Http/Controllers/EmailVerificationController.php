<?php

namespace JeffGreco13\FilamentBreezy\Http\Controllers;

use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class EmailVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware([Authenticate::class]);
    }

    public function __invoke(string $id, string $hash): RedirectResponse
    {
        if (! hash_equals((string) $id, (string) Filament::auth()->id())) {
            throw new AuthorizationException();
        }

        if (
            ! hash_equals(
                (string) $hash,
                sha1(Filament::auth()->user()->getEmailForVerification())
            )
        ) {
            throw new AuthorizationException();
        }

        if (Filament::auth()->user()->hasVerifiedEmail()) {
            return redirect(config("filament.home_url"));
        }

        if (Filament::auth()->user()->markEmailAsVerified()) {
            event(new Verified(auth()->user()));
        }

        return redirect(config("filament.home_url"));
    }
}
