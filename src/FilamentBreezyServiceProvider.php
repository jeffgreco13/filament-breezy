<?php

namespace JeffGreco13\FilamentBreezy;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use JeffGreco13\FilamentBreezy\Commands\FilamentBreezyCommand;

class FilamentBreezyServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name("filament-breezy")
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration("create_filament-breezy_table")
            ->hasCommand(FilamentBreezyCommand::class);
    }

    protected function getResources(): array
    {
        if (!config("filament-breezy.enable_teams")) {
            return [];
        }
        return config("filament-breezy.enable_team_resource")
            ? [Resources\FilamentTeamResource::class]
            : [];
    }

    protected function getPages(): array
    {
        return config("filament-breezy.enable_profile_page")
            ? [Pages\MyProfile::class]
            : [];
    }

    protected function getWidgets(): array
    {
        if (!config("filament-breezy.enable_teams")) {
            return [];
        }
        $widgets = [];
        if (config("filament-breezy.enable_send_widget")) {
            array_push($widgets, Widgets\SendInvites::class);
        }
        if (config("filament-breezy.enable_manage_invites_widget")) {
            array_push($widgets, Widgets\ManageInvites::class);
        }
        return $widgets;
    }
}
