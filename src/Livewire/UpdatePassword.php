<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UpdatePassword extends MyProfileComponent
{
    protected string $view = 'filament-breezy::livewire.update-password';

    public ?array $data = [];

    public $user;

    public static $sort = 20;

    public function mount(): void
    {
        $this->user = Filament::getCurrentOrDefaultPanel()->auth()->user();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('current_password')
                    ->label(__('filament-breezy::default.password_confirm.current_password'))
                    ->required()
                    ->password()
                    ->rule('current_password')
                    ->visible(filament('filament-breezy')->getPasswordUpdateRequiresCurrent()),
                TextInput::make('new_password')
                    ->label(__('filament-breezy::default.fields.new_password'))
                    ->password()
                    ->rules(filament('filament-breezy')->getPasswordUpdateRules())
                    ->required(),
                TextInput::make('new_password_confirmation')
                    ->label(__('filament-breezy::default.fields.new_password_confirmation'))
                    ->password()
                    ->same('new_password')
                    ->required(),
            ])
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = collect($this->form->getState())->only('new_password')->all();
        $this->user->forceFill([
            'password' => Hash::make($data['new_password']),
            'remember_token' => Str::random(60),
        ])->save();
        session()->forget('password_hash_'.Auth::getDefaultDriver());
        $this->reset(['data']);

        Notification::make()
            ->success()
            ->title(__('filament-breezy::default.profile.password.notify'))
            ->send();
    }
}
