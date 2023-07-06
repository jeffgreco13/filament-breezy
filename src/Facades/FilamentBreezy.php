<?php

namespace Jeffgreco13\FilamentBreezy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Jeffgreco13\FilamentBreezy\FilamentBreezy
 */
class FilamentBreezy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Jeffgreco13\FilamentBreezy\FilamentBreezy::class;
    }
}
