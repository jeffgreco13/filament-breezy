<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;

class PersonalInfo extends MyProfileComponent
{
    protected string $view = 'filament-breezy::livewire.personal-info';

    public ?array $data = [];

    public $user;

    public $userClass;

    public bool $hasAvatars;

    public array $only = ['name', 'email'];

    public static $sort = 10;

    public function mount()
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $this->userClass = get_class($this->user);
        $this->hasAvatars = filament('filament-breezy')->hasAvatars();

        if ($this->hasAvatars) {
            $this->only[] = filament('filament-breezy')->getAvatarUploadComponent()->getStatePath(false);
        }

        $this->form->fill($this->user->only($this->only));
    }

    protected function getProfileFormSchema()
    {
        $groupFields = Forms\Components\Group::make([
            $this->getNameComponent(),
            $this->getEmailComponent(),
        ])->columnSpan(2);

        return ($this->hasAvatars)
            ? [filament('filament-breezy')->getAvatarUploadComponent(), $groupFields]
            : [$groupFields];
    }

    protected function getNameComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('name')
            ->required()
            ->label(__('filament-breezy::default.fields.name'));
    }

    protected function getEmailComponent(): Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('email')
            ->required()
            ->email()
            ->unique($this->userClass, ignorable: $this->user)
            ->label(__('filament-breezy::default.fields.email'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getProfileFormSchema())->columns(3)
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = collect($this->form->getState())->only($this->only)->all();
        $this->user->update($data);
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
