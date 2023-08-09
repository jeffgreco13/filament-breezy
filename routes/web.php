<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use Jeffgreco13\FilamentBreezy\Pages\TwoFactorPage;

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
                        Route::get($hasTenancy ? '/{tenant}/two-factor-authentication' : '/two-factor-authentication', TwoFactorPage::class)->name('auth.two-factor');
                    });
            }
        }
    });
