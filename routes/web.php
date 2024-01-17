<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;

Route::name('filament.')
    ->group(function () {
        foreach (Filament::getPanels() as $panel) {
            $panelId = $panel->getId();
            $domains = $panel->getDomains();
            $hasTenancy = $panel->hasTenancy();
            foreach ((empty($domains) ? [null] : $domains) as $domain) {
                Route::domain($domain)
                    ->middleware($panel->getMiddleware())
                    ->name("{$panelId}.")
                    ->prefix($panel->getPath())
                    ->group(function () use ($panel, $hasTenancy) {
                        if ($panel->hasPlugin('filament-breezy')) {
                            $route = $hasTenancy ? '/{tenant}/two-factor-authentication' : '/two-factor-authentication';
                            $action = filament('filament-breezy')->getTwoFactorRouteAction();

                            Route::get($route, $action)->name('auth.two-factor');
                        }
                    });
            }
        }
    });
