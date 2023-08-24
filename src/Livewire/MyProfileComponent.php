<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;

class MyProfileComponent extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public static $sort = 0;

    function getName()
    {
        return str(static::class)->afterLast('\\')->snake();
    }

    public function render()
    {
        return view($this->view);
    }

    public static function canView(): bool
    {
        return true;
    }

    public static function getSort(): int
    {
        return static::$sort;
    }

    public static function setSort(int $sort): void
    {
        static::$sort = $sort;
    }
}
