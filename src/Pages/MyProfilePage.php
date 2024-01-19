<?php

namespace Jeffgreco13\FilamentBreezy\Pages;

use Filament\Pages\Page;

class MyProfilePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $slug = 'my-profile';

    protected static string $view = 'filament-breezy::filament.pages.my-profile';

    public function getTitle(): string
    {
        return __('filament-breezy::default.profile.my_profile');
    }

    public function getHeading(): string
    {
        return __('filament-breezy::default.profile.my_profile');
    }

    public function getSubheading(): ?string
    {
        return __('filament-breezy::default.profile.subheading') ?? null;
    }

    public static function getSlug(): string
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
