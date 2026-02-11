<?php

namespace Jeffgreco13\FilamentBreezy;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Event;
use Jeffgreco13\FilamentBreezy\Commands\Install;
use Jeffgreco13\FilamentBreezy\Events\PasskeyUsedToAuthenticate;
use Jeffgreco13\FilamentBreezy\Listeners\SkipTwoFactorAfterPasskeyAuthentication;
use Jeffgreco13\FilamentBreezy\Livewire\BrowserSessions;
use Jeffgreco13\FilamentBreezy\Livewire\PasskeyAction;
use Jeffgreco13\FilamentBreezy\Livewire\Passkeys;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Jeffgreco13\FilamentBreezy\Livewire\SanctumTokens;
use Jeffgreco13\FilamentBreezy\Livewire\TwoFactorAuthentication;
use Jeffgreco13\FilamentBreezy\Livewire\UpdatePassword;
use Jeffgreco13\FilamentBreezy\Pages\TwoFactorPage;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentBreezyServiceProvider extends PackageServiceProvider
{
    public function bootingPackage(): void
    {
        FilamentAsset::register([
            Js::make('filament-breezy', __DIR__.'/../resources/dist/filament-breezy.js'),
        ]);

        Event::listen(PasskeyUsedToAuthenticate::class, SkipTwoFactorAfterPasskeyAuthentication::class);

        Livewire::component('personal_info', PersonalInfo::class);
        Livewire::component('update_password', UpdatePassword::class);
        Livewire::component('sanctum_tokens', SanctumTokens::class);
        Livewire::component('two_factor_authentication', TwoFactorAuthentication::class);
        Livewire::component('browser_sessions', BrowserSessions::class);
        Livewire::component('passkeys', Passkeys::class);

        Livewire::component('two-factor-page', TwoFactorPage::class);
        Livewire::component('passkey_action', PasskeyAction::class);
    }

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
                'create_passkeys_table',
            ])
            ->hasCommand(Install::class);
    }
}
