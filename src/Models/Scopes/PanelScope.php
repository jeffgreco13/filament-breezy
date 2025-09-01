<?php

namespace Jeffgreco13\FilamentBreezy\Models\Scopes;

use Filament\Exceptions\NoDefaultPanelSetException;
use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PanelScope implements Scope
{
    /**
     * @param  Builder<Model>  $builder
     *
     * @throws NoDefaultPanelSetException
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('panel_id', Filament::getCurrentOrDefaultPanel()->getId());
    }
}
