<?php


namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\Authenticatable;
use Spatie\LaravelPasskeys\Actions\GeneratePasskeyRegisterOptionsAction;
use Spatie\LaravelPasskeys\Actions\StorePasskeyAction;
use Spatie\LaravelPasskeys\Models\Concerns\HasPasskeys;
use Spatie\LaravelPasskeys\Support\Config;
use Throwable;

class Passkeys extends MyProfileComponent implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected string $view = 'filament-breezy::livewire.passkeys';
    protected string $modalWidth = 'md';

    public Authenticatable&HasPasskeys $user;
    public string $name = '';
    public static $sort = 60;

    public function mount(): void
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
    }

    protected function getTableQuery(): Builder
    {
        $auth = Filament::getCurrentPanel()->auth();

        return app(Config::getPassKeyModel())->where('authenticatable_id', $auth->id());
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->label(__('filament-breezy::default.fields.name')),
            Tables\Columns\TextColumn::make('last_used_at')
                ->dateTime()
                ->label(__('filament-breezy::default.profile.passkeys.last_used'))
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->date()
                ->label(__('filament-breezy::default.fields.created'))
                ->sortable(),
        ];
    }

    protected function getPasskeyFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label(__('filament-breezy::default.fields.name'))
                ->required(),
        ];
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Tables\Actions\Action::make('createPasskey')
                ->label(__('filament-breezy::default.profile.passkeys.create.submit.label'))
                ->modalWidth($this->modalWidth)
                ->form($this->getPasskeyFormSchema())
                ->action(fn ($data) => $this->handleCreatePasskey($data)),
        ];
    }

    protected function handleCreatePasskey(array $data): void
    {
        $this->name = $data['name'];
        $this->dispatch('passkeyPropertiesValidated', [
            'passkeyOptions' => json_decode($this->generatePasskeyOptions()),
        ]);
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\DeleteAction::make()->iconButton(),
        ];
    }

    public function storePasskey(string $passkey): void
    {
        $storePasskeyAction = Config::getAction('store_passkey', StorePasskeyAction::class);

        try {
            $storePasskeyAction->execute(
                $this->user,
                $passkey,
                $this->previouslyGeneratedPasskeyOptions(),
                request()->getHost(),
                ['name' => $this->name]
            );

            Notification::make()
                ->success()
                ->title(__('filament-breezy::default.profile.passkeys.create.notify'))
                ->send();
        } catch (Throwable $e) {
            Notification::make()
                ->danger()
                ->title(__('filament-breezy::default.profile.passkeys.default.profile.passkeys.error_generating_the_passkey'))
                ->send();
        }
    }

    protected function generatePasskeyOptions(): string
    {
        $generatePassKeyOptionsAction = Config::getAction('generate_passkey_register_options', GeneratePasskeyRegisterOptionsAction::class);
        $options = $generatePassKeyOptionsAction->execute($this->user);

        session()->put('passkey-registration-options', $options);

        return $options;
    }

    protected function previouslyGeneratedPasskeyOptions(): ?string
    {
        return session()->pull('passkey-registration-options');
    }
}
