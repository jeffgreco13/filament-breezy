<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Forms;
use Filament\Tables;
use Laravel\Sanctum\Sanctum;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class SanctumTokens extends MyProfileComponent implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected string $view = "filament-breezy::livewire.sanctum-tokens";

    protected string $modalWidth = "md";

    protected int $abilityColumns = 2;

    public $user;
    public ?string $plainTextToken;

    public static $sort = 40;

    public function mount()
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
    }

    protected function getTableQuery(): Builder
    {
        $auth = Filament::getCurrentPanel()->auth();
        return app(Sanctum::$personalAccessTokenModel)->where([
            ["tokenable_id", '=', $auth->id()],
            ["tokenable_type", '=', get_class($auth->user())],
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
                ->label("Created")
                ->sortable(),
            Tables\Columns\TextColumn::make("expires_at")
                ->color(fn($record) => now()->gt($record->expires_at) ? 'danger' : null)
                ->date()
                ->label("Expires")
                ->sortable(),
            Tables\Columns\TextColumn::make('abilities')
                ->badge()
                ->getStateUsing(fn($record)=>sizeof($record->abilities))
        ];
    }

    protected function getSanctumFormSchema(bool $edit = false): array
    {
        return [
            Forms\Components\TextInput::make('token_name')
                ->label(__('filament-breezy::default.fields.token_name'))
                ->required()
                ->hidden($edit),
            Forms\Components\CheckboxList::make('abilities')
                ->label(__('filament-breezy::default.fields.abilities'))
                ->options(filament('filament-breezy')->getSanctumPermissions())
                ->columns($this->abilityColumns)
                ->required(),
            Forms\Components\DatePicker::make('expires_at')
                ->label(__('filament-breezy::default.fields.token_expiry'))

        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\Action::make('createToken')
                ->label( __('filament-breezy::default.profile.sanctum.create.submit.label') )
                ->modalWidth($this->modalWidth)
                ->form($this->getSanctumFormSchema())
                ->action(function($data){
                    $this->plainTextToken = $this->user->createToken($data['token_name'], array_values($data['abilities']))->plainTextToken;
                    Notification::make()
                        ->success()
                        ->title(__('filament-breezy::default.profile.sanctum.create.notify'))
                        ->send();
                })
        ];
    }

    // protected function getTableBulkActions(): array
    // {
    //     return [
    //         Tables\Actions\DeleteBulkAction::make()
    //     ];
    // }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\EditAction::make('edit')
                ->iconButton()
                ->modalWidth($this->modalWidth)
                ->form($this->getSanctumFormSchema(edit:true)),
            Tables\Actions\DeleteAction::make()
                ->iconButton()
        ];
    }

}
