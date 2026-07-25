<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PersonalInfo extends MyProfileComponent
{
    protected string $view = 'filament-breezy::livewire.personal-info';

    public ?array $data = [];

    public $user;

    public $userClass;

    public bool $hasAvatars;

    public array $only = ['name', 'email'];

    public static $sort = 10;

    public function mount(): void
    {
        $this->user = filament('filament-breezy')->auth()->user();
        $this->userClass = get_class($this->user);
        $this->hasAvatars = filament('filament-breezy')->hasAvatars();

        if ($this->hasAvatars) {
            $this->only[] = filament('filament-breezy')->getAvatarUploadComponent()->getStatePath(false);
        }

        $this->form->fill($this->user->only($this->only));
    }

    protected function getProfileFormSchema(): array
    {
        $groupFields = Group::make($this->getProfileFormComponents())
            ->columnSpan($this->hasAvatars ? 2 : 3);

        return ($this->hasAvatars)
            ? [filament('filament-breezy')->getAvatarUploadComponent(), $groupFields]
            : [$groupFields];
    }

    protected function getProfileFormComponents(): array
    {
        return [
            $this->getNameComponent(),
            $this->getEmailComponent(),
            $this->getCurrentPasswordComponent(),
        ];
    }

    protected function getNameComponent(): TextInput
    {
        return TextInput::make('name')
            ->required()
            ->label(__('filament-breezy::default.fields.name'));
    }

    protected function getEmailComponent(): TextInput
    {
        return TextInput::make('email')
            ->required()
            ->email()
            ->live(onBlur: true)
            ->unique($this->userClass, ignorable: $this->user)
            ->label(__('filament-breezy::default.fields.email'));
    }

    protected function getCurrentPasswordComponent(): TextInput
    {
        return TextInput::make('current_password')
            ->password()
            ->rule('current_password')
            ->required()
            ->autocomplete('current-password')
            ->visible(fn (Get $get): bool => $get('email') !== $this->user->email)
            ->label(__('filament-breezy::default.password_confirm.current_password'));
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components($this->getProfileFormSchema())
            ->columns(3)
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = collect($this->form->getState())->only($this->only)->all();
        $this->user->update($data);
        $this->form->fill($this->user->only($this->only));
        $this->sendNotification();
    }

    protected function sendNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-breezy::default.profile.personal_info.notify'))
            ->send();
    }
}
