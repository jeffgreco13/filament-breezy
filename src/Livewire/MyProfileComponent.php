<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Concerns\CanBeHidden;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;

class MyProfileComponent extends Component implements HasForms, HasActions
{
    use InteractsWithForms, CanBeHidden, InteractsWithActions;

    public $sort = 0;

    public static function getName(): ?string
    {
        return str(static::class)->afterLast('\\')->snake();
    }

    public function render()
    {
        return view($this->view);
    }

}
