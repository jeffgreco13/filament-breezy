<?php

namespace JeffGreco13\FilamentBreezy;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JeffGreco13\FilamentBreezy\Commands\FilamentBreezyCommand;

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
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-breezy_table')
            ->hasCommand(FilamentBreezyCommand::class);
    }
}
