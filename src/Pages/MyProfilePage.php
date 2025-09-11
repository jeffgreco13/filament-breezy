<?php

namespace Jeffgreco13\FilamentBreezy\Pages;

use Filament\Pages\Page;
use Filament\Panel;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;

class MyProfilePage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle;

    protected string $view = 'filament-breezy::filament.pages.my-profile';

    public function getTitle(): string|Htmlable
    {
        return __('filament-breezy::default.profile.my_profile');
    }

    public function getHeading(): string|Htmlable
    {
        return __('filament-breezy::default.profile.my_profile');
    }

    public function getSubheading(): string|Htmlable|null
    {
        return __('filament-breezy::default.profile.subheading') ?? null;
    }

    public static function getSlug(?Panel $panel = null): string
    {
        return filament('filament-breezy')->slug();
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-breezy::default.profile.profile');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return filament('filament-breezy')->shouldRegisterNavigation('myProfile');
    }

    public static function getNavigationGroup(): ?string
    {
        return filament('filament-breezy')->getNavigationGroup('myProfile');
    }

    public function getRegisteredMyProfileComponents(): array
    {
        return filament('filament-breezy')->getRegisteredMyProfileComponents();
    }
}
