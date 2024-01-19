<?php

namespace Jeffgreco13\FilamentBreezy\Middleware;

use Closure;
use Illuminate\Http\Request;
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
            ! str($request->route()->getName())->contains('logout')
        ) {
            /** @var BreezyCore $breezy */
            $breezy = filament('filament-breezy');

            $myProfileRouteName = 'filament.'.filament()->getCurrentPanel()->getId().'.pages.'.$breezy->slug();

            $myProfileRouteParameters = [];

            if (filament()->hasTenancy()) {
                if (! $tenantId = request()->route()->parameter('tenant')) {
                    return $next($request);
                }
                $myProfileRouteParameters = ['tenant' => $tenantId];
                $twoFactorRoute = route('filament.'.filament()->getCurrentPanel()->getId().'.auth.two-factor', ['tenant' => $tenantId, 'next' => request()->getRequestUri()]);
            } else {
                $twoFactorRoute = route('filament.'.filament()->getCurrentPanel()->getId().'.auth.two-factor', ['next' => request()->getRequestUri()]);
            }

            if ($breezy->shouldForceTwoFactor() && ! $request->routeIs($myProfileRouteName)) {
                return redirect()->route($myProfileRouteName, $myProfileRouteParameters);
            } elseif (filament()->auth()->user()->hasConfirmedTwoFactor() && ! filament()->auth()->user()->hasValidTwoFactorSession()) {
                return redirect($twoFactorRoute);
            }
        }

        // Fall through
        return $next($request);
    }
}
