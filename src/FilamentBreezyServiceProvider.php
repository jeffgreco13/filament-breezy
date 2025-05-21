<?php

namespace Jeffgreco13\FilamentBreezy;

use Jeffgreco13\FilamentBreezy\Commands\Install;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Jeffgreco13\FilamentBreezy\Listeners\PasskeyUsedToAuthenticateListener;
use Spatie\LaravelPasskeys\Events\PasskeyUsedToAuthenticateEvent;
use Illuminate\Support\Facades\Event;

class FilamentBreezyServiceProvider extends PackageServiceProvider
{


    public function configurePackage(Package $package): void
    {
         Event::listen(
            PasskeyUsedToAuthenticateEvent::class,
            PasskeyUsedToAuthenticateListener::class
        );
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
            // ->hasMigration('add_two_factor_columns_to_table')
            ->hasMigration('create_breezy_sessions_table')
            ->hasCommand(Install::class);
    }
}
