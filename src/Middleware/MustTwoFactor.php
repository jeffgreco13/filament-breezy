<?php

namespace Jeffgreco13\FilamentBreezy\Middleware;

use Closure;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Hash;
use Jeffgreco13\FilamentBreezy\Facades\FilamentBreezy;
use Symfony\Component\HttpFoundation\Response;

class MustTwoFactor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $breezy = filament('filament-breezy');
        if($breezy->auth()->check() && !$request->routeIs('filament.admin.auth.logout')){
            // Logged in.
            $myProfileRouteName = 'filament.' . filament('filament-breezy')->getCurrentPanel()->getId() . '.pages.my-profile';
            if ($breezy->shouldForceTwoFactor() && !$request->routeIs($myProfileRouteName)){
                return redirect()->route($myProfileRouteName);
            } else if ($breezy->auth()->user()->hasConfirmedTwoFactor() && !$breezy->auth()->user()->hasValidTwoFactorSession()){
                return redirect()->route('filament.' . $breezy->getCurrentPanel()->getId() . '.auth.two-factor');
            }


        }
        return $next($request);
    }
}
