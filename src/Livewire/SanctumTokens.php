<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Sanctum\Sanctum;

class SanctumTokens extends MyProfileComponent implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament-breezy::livewire.sanctum-tokens';

    protected string $modalWidth = 'md';

    protected int $abilityColumns = 2;

    public $user;

    public ?string $plainTextToken;

    public static $sort = 40;

    public function mount(): void
    {
        $this->user = Filament::getCurrentOrDefaultPanel()->auth()->user();
    }

    protected function getTableQuery(): Builder
    {
        $auth = Filament::getCurrentOrDefaultPanel()->auth();

        return app(Sanctum::$personalAccessTokenModel)->where([
            ['tokenable_id', '=', $auth->id()],
            ['tokenable_type', '=', $auth->user()->getMorphClass()],
        ]);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->label(__('filament-breezy::default.fields.token_name')),
            TextColumn::make('created_at')
                ->date()
                ->label(__('filament-breezy::default.fields.created'))
                ->sortable(),
            TextColumn::make('expires_at')
                ->color(fn ($record) => now()->gt($record->expires_at) ? 'danger' : null)
                ->date()
                ->label(__('filament-breezy::default.fields.expires'))
                ->sortable(),
            TextColumn::make('abilities')
                ->badge()
                ->label(__('filament-breezy::default.fields.abilities'))
                ->getStateUsing(fn ($record) => count($record->abilities)),
        ];
    }

    protected function getSanctumFormSchema(bool $edit = false): array
    {
        return [
            TextInput::make('token_name')
                ->label(__('filament-breezy::default.fields.token_name'))
                ->required()
                ->hidden($edit),
            CheckboxList::make('abilities')
                ->label(__('filament-breezy::default.fields.abilities'))
                ->options(filament('filament-breezy')->getSanctumPermissions())
                ->columns($this->abilityColumns)
                ->required(),
            DatePicker::make('expires_at')
                ->label(__('filament-breezy::default.fields.token_expiry')),

        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('createToken')
                ->label(__('filament-breezy::default.profile.sanctum.create.submit.label'))
                ->modalWidth($this->modalWidth)
                ->modalSubmitActionLabel(__('filament-breezy::default.profile.sanctum.create.submit.label'))
                ->schema($this->getSanctumFormSchema())
                ->action(function ($data) {
                    $this->plainTextToken = $this->user->createToken($data['token_name'], array_values($data['abilities']), $data['expires_at'] ? Carbon::createFromFormat('Y-m-d', $data['expires_at']) : null)->plainTextToken;
                    Notification::make()
                        ->success()
                        ->title(__('filament-breezy::default.profile.sanctum.create.notify'))
                        ->send();
                }),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make('edit')
                ->label(__('filament-breezy::default.profile.sanctum.update.submit.label'))
                ->iconButton()
                ->modalWidth($this->modalWidth)
                ->schema($this->getSanctumFormSchema(edit: true)),
            DeleteAction::make()
                ->iconButton(),
        ];
    }
}
