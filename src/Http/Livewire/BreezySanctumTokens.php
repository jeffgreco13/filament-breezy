<?php

namespace JeffGreco13\FilamentBreezy\Http\Livewire;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\Sanctum;
use Livewire\Component;

class BreezySanctumTokens extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected $listeners = ["tokenCreated" => "render"];

    public function render()
    {
        return view("filament-breezy::livewire.breezy-sanctum-tokens");
    }

    protected function getTableQuery(): Builder
    {
        return app(Sanctum::$personalAccessTokenModel)->where([
            ["tokenable_id", '=', Filament::auth()->id()],
            ["tokenable_type", '=', config('filament-breezy.user_model')],
        ]);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make("name")
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make("created_at")
                ->date()
                ->label("Date created"),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\IconButtonAction::make("edit")
                ->action("edit")
                ->icon("heroicon-o-pencil-alt")
                ->modalWidth("sm")
                ->mountUsing(
                    fn ($form, $record) => $form->fill($record->toArray())
                )
                ->form([
                    Forms\Components\CheckboxList::make("abilities")
                        ->label(__("filament-breezy::default.fields.abilities"))
                        ->options(config("filament-breezy.sanctum_permissions"))
                        ->columns(2)
                        ->required()
                        ->afterStateHydrated(function ($component, $state) {
                            $abilities = config(
                                "filament-breezy.sanctum_permissions"
                            );
                            $selected = collect($abilities)
                                ->filter(function ($item, $key) use ($state) {
                                    return in_array($item, $state);
                                })
                                ->keys()
                                ->toArray();
                            $component->state($selected);
                        }),
                ]),
            Tables\Actions\IconButtonAction::make("delete")
                ->action("delete")
                ->color("danger")
                ->icon("heroicon-o-trash")
                ->requiresConfirmation(),
        ];
    }

    public function delete($record)
    {
        $record->delete();
    }

    public function edit($record, $data)
    {
        $indexes = $data["abilities"];
        $abilities = config("filament-breezy.sanctum_permissions");
        $selected = collect($abilities)
            ->filter(function ($item, $key) use ($indexes) {
                return in_array($key, $indexes);
            })
            ->toArray();
        $record->update([
            "abilities" => array_values($selected),
        ]);
        Filament::notify(
            "success",
            __("filament-breezy::default.profile.sanctum.update.notify")
        );
    }
}
