<?php

namespace Jeffgreco13\FilamentBreezy\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use Jeffgreco13\FilamentBreezy\BreezyCore;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugin(BreezyCore::make()->myProfile());
    }
}
