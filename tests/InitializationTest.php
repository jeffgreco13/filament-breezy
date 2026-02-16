<?php

use Filament\Panel;
use Jeffgreco13\FilamentBreezy\BreezyCore;

it('can be instantiated and registered without initialization', function () {
    $plugin = app(BreezyCore::class);

    // This simulates what Filament does when registering the plugin
    $panel = Panel::make('test');

    expect(fn () => $plugin->register($panel))->not->toThrow(Error::class);
    expect(fn () => $plugin->boot($panel))->not->toThrow(Error::class);
});
