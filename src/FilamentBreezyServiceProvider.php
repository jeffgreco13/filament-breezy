<?php

namespace Jeffgreco13\FilamentBreezy;

use Jeffgreco13\FilamentBreezy\Commands\Install;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBreezyServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-breezy')
            ->hasRoute('web')
            ->hasViews()
            ->hasTranslations()
            ->hasMigrations([
                'create_breezy_sessions_table',
                'alter_breezy_sessions_table',
            ])
            ->hasCommand(Install::class);
    }
}
