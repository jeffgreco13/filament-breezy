<?php

namespace JeffGreco13\FilamentBreezy;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;
use JeffGreco13\FilamentBreezy\Commands\FilamentBreezyCommand;
use JeffGreco13\FilamentBreezy\Http\Livewire\Auth;
use JeffGreco13\FilamentBreezy\Http\Livewire\BreezySanctumTokens;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;

class FilamentBreezyServiceProvider extends PluginServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name("filament-breezy")
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('add_two_factor_columns_to_table')
            ->hasRoute("web")
            ->hasTranslations();
        //->hasCommand(FilamentBreezyCommand::class);
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        FilamentBreezy::setPasswordRules(config('filament-breezy.password_rules'));

        Livewire::component(Auth\Login::getName(), Auth\Login::class);

        Livewire::component(
            Auth\ResetPassword::getName(),
            Auth\ResetPassword::class
        );
        Livewire::component(Auth\Verify::getName(), Auth\Verify::class);

        if (config("filament-breezy.enable_registration")) {
            Livewire::component(Auth\Register::getName(), Auth\Register::class);
        }

        if (config("filament-breezy.enable_sanctum")) {
            Livewire::component(
                BreezySanctumTokens::getName(),
                BreezySanctumTokens::class
            );
        }


        if (config("filament-breezy.enable_profile_page") && config('filament-breezy.show_profile_page_in_user_menu')) {
            Filament::serving(function () {
                Filament::registerUserMenuItems([
                    'account' => UserMenuItem::make()->url(MyProfile::getUrl()),
                ]);
            });
        }

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return route('filament.password.reset', ['token' => $token]);
        });

        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'filament.verification.verify',
                Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });
    }

    protected function getPages(): array
    {
        return config("filament-breezy.enable_profile_page")
            ? [config("filament-breezy.profile_page_component_path")]
            : [];
    }
}
