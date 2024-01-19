<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class MyProfileComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions, InteractsWithForms;

    public static $sort = 0;

    public function getName()
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
