<?php

namespace JeffGreco13\FilamentBreezy\Pages;

use Filament\Pages\Page;
use Filament\Filament;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MyProfile extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    protected static ?string $navigationGroup = "Account";
    protected static ?string $navigationIcon = "heroicon-o-document-text";
    protected static string $view = "filament-breezy::filament.pages.my-profile";

    public User $user;
    public $new_password, $new_password_confirmation;
    public $hasTeams;

    public function mount()
    {
        $this->user = auth()->user();
        $this->updateProfileForm->fill($this->user->toArray());
    }

    protected function getForms(): array
    {
        return [
            "updateProfileForm" => $this->makeForm()
                ->schema($this->getUpdateProfileFormSchema())
                ->model($this->user),
            "updatePasswordForm" => $this->makeForm()->schema(
                $this->getUpdatePasswordFormSchema()
            ),
        ];
    }

    protected function getUpdateProfileFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("name"),
            Forms\Components\TextInput::make("email")->unique(ignorable: $this->user),
        ];
    }

    public function updateProfile()
    {
        $this->user->update($this->updateProfileForm->getState());
        $this->notify("success", "Profile updated successfully!");
    }

    protected function getUpdatePasswordFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make("new_password")
                ->password()
                ->rules(config('filament-breezy.password_rules'))
                ->required(),
            Forms\Components\TextInput::make("new_password_confirmation")
                ->label("Confirm password")
                ->password()
                ->same("new_password")
                ->required(),
        ];
    }

    public function updatePassword()
    {
        $state = $this->updatePasswordForm->getState();
        $this->user->update([
            "password" => Hash::make($state["new_password"]),
        ]);
        session()->forget("password_hash_web");
        auth("web")->login($this->user);
        $this->notify("success", "Password updated successfully!");
        $this->reset(["new_password", "new_password_confirmation"]);
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => 'Profile',
        ];
    }
}
