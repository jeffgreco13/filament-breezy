<?php

namespace Jeffgreco13\FilamentBreezy\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Jeffgreco13\FilamentBreezy\FilamentBreezyServiceProvider;
use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (
                string $modelName
            ) => "Jeffgreco13\\FilamentBreezy\\Database\\Factories\\" .
                class_basename($modelName) .
                "Factory"
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentBreezyServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set("database.default", "testing");

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-breezy_table.php.stub';
        $migration->up();
        */
    }
}
