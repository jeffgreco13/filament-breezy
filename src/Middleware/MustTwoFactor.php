<?php

namespace Jeffgreco13\FilamentBreezy\Middleware;

use Closure;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
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
        if (
            filament()->auth()->check() &&
            !str($request->route()->getName())->contains('logout')
        ){
            $breezy = filament('filament-breezy');
            $myProfileRouteName = 'filament.' . filament()->getCurrentPanel()->getPath() . '.pages.my-profile';

            if (filament()->hasTenancy()){
                if (!$tenantId = request()->route()->parameter('tenant')){
                    return $next($request);
                }
                $twoFactorRoute = route('filament.' . filament()->getCurrentPanel()->getId() . '.auth.two-factor',['tenant'=>$tenantId]);
            } else {
                $twoFactorRoute = route('filament.' . filament()->getCurrentPanel()->getId() . '.auth.two-factor');
            }

            if ($breezy->shouldForceTwoFactor() && !$request->routeIs($myProfileRouteName)){
                return redirect()->route($myProfileRouteName);
            } else if (filament()->auth()->user()->hasConfirmedTwoFactor() && !filament()->auth()->user()->hasValidTwoFactorSession()) {
                return redirect($twoFactorRoute);
            }
        }
        // Fall through
        return $next($request);
    }
}
