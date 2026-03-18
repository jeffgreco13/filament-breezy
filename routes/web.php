<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Jeffgreco13\FilamentBreezy\BreezyCore;

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
                            Route::prefix($hasTenancy ? '/{tenant}' : '/')->group(function () use ($panel) {
                                /** @var BreezyCore $plugin */
                                $plugin = $panel->getPlugin('filament-breezy');

                                Route::get('/two-factor-authentication', $plugin->getTwoFactorRouteAction())->name('auth.two-factor');

                                Route::get('/passkeys/authentication-options', function () {
                                    return [];
                                })->name('passkeys.authentication_options');
                            });
                        }
                    });
            }
        }
    });
