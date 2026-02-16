<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Jeffgreco13\FilamentBreezy\Models\Passkey;
use Throwable;

class Passkeys extends MyProfileComponent implements HasTable
{
    use InteractsWithTable;

    protected string $view = 'filament-breezy::livewire.passkeys';

    protected string $modalWidth = 'md';

    public $user;

    public ?string $name;

    public static $sort = 35;

    public function mount(): void
    {
        $this->user = Filament::getCurrentOrDefaultPanel()->auth()->user();
    }

    protected function getTableQuery(): Builder
    {
        $auth = Filament::getCurrentOrDefaultPanel()->auth();

        return Passkey::query()->where([
            'authenticatable_id' => $auth->id(),
            'authenticatable_type' => $auth->user()->getMorphClass(),
        ]);
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->label(__('filament-breezy::default.fields.passkey_name'))
                ->sortable(),
            TextColumn::make('last_used_at')
                ->label(__('filament-breezy::default.fields.last_used_at'))
                ->date()
                ->sortable(),
            TextColumn::make('created_at')
                ->label(__('filament-breezy::default.fields.created'))
                ->date()
                ->sortable(),
        ];
    }

    protected function getPasskeyFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label(__('filament-breezy::default.fields.passkey_name'))
                ->required(),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('createPasskey')
                ->label(__('filament-breezy::default.profile.passkeys.create.submit.label'))
                ->modalWidth($this->modalWidth)
                ->modalSubmitActionLabel(__('filament-breezy::default.profile.passkeys.create.submit.submit_label'))
                ->schema($this->getPasskeyFormSchema())
                ->action(function ($data) {
                    $this->name = $data['name'];
                    $this->dispatch('passkeyPropertiesValidated', [
                        'passkeyOptions' => json_decode($this->generatePasskeyOptions()),
                    ]);
                }),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make('edit')
                ->label(__('filament-breezy::default.profile.passkeys.update.submit.label'))
                ->iconButton()
                ->modalWidth($this->modalWidth)
                ->schema($this->getPasskeyFormSchema()),
            DeleteAction::make()
                ->iconButton(),
        ];
    }

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    public function storePasskey(string $passkey): void
    {
        try {
            filament('filament-breezy')->storePasskey(
                $this->user,
                $passkey,
                $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => $this->name],
            );

            Notification::make()
                ->success()
                ->title(__('filament-breezy::default.profile.passkeys.create.success_message'))
                ->send();
        } catch (Throwable $e) {
            Notification::make()
                ->danger()
                ->title(__('filament-breezy::default.profile.passkeys.create.error_message'))
                ->send();
        }
    }

    protected function generatePasskeyOptions(): string
    {
        $options = filament('filament-breezy')->generatePasskeyRegisterOptions();

        session()->put('passkey-registration-options', $options);

        return $options;
    }

    protected function previouslyGeneratedPasskeyOptions(): ?string
    {
        return session()->pull('passkey-registration-options');
    }
}
