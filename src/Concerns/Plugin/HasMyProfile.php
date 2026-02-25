<?php

namespace Jeffgreco13\FilamentBreezy\Concerns\Plugin;

use BackedEnum;
use Closure;
use Filament\Forms\Components\FileUpload;
use Filament\Support\Icons\Heroicon;
use Illuminate\Validation\Rules\Password;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;

trait HasMyProfile
{
    protected array $myProfile = [];

    protected ?string $customMyProfilePageClass = null;

    /** @var ?Closure */
    protected $avatarUploadComponent;

    protected array $ignoredMyProfileComponents = [];

    protected array $registeredMyProfileComponents = [];

    public function myProfile(bool $condition = true, bool $shouldRegisterUserMenu = true, bool $shouldRegisterNavigation = false, bool $hasAvatars = false, string $slug = 'my-profile', ?string $navigationGroup = null, ?string $userMenuLabel = null, string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUserCircle): static
    {
        $this->myProfile = get_defined_vars();

        return $this;
    }

    /** @param class-string<Pages\MyProfilePage> $class */
    public function customMyProfilePage(string $class): static
    {
        $this->customMyProfilePageClass = $class;

        return $this;
    }

    public function hasAvatars()
    {
        return $this->myProfile['hasAvatars'];
    }

    public function slug()
    {
        return $this->myProfile['slug'];
    }

    public function avatarUploadComponent(Closure $component): static
    {
        $this->avatarUploadComponent = $component;

        return $this;
    }

    public function getAvatarUploadComponent()
    {
        $fileUpload = FileUpload::make('avatar_url')
            ->label(__('filament-breezy::default.fields.avatar'))
            ->avatar()
            ->disk('public')
            ->directory('avatars')
            ->visible('public');

        return is_null($this->avatarUploadComponent) ? $fileUpload : $this->evaluate($this->avatarUploadComponent, namedInjections: [
            'fileUpload' => $fileUpload,
        ]);
    }

    public function withoutMyProfileComponents(array|Closure $components): static
    {
        $this->ignoredMyProfileComponents = is_array($components) ? $components : $this->evaluate($components);

        return $this;
    }

    public function myProfileComponents(array $components): static
    {
        $merged = [
            ...$components,
            ...$this->registeredMyProfileComponents,
        ];

        // Ensure we have string keys
        $merged = array_combine(
            array_map('strval', array_keys($merged)),
            array_values($merged)
        );

        $this->registeredMyProfileComponents = $merged;

        return $this;
    }

    public function getRegisteredMyProfileComponents(): array
    {
        $ignoredComponents = is_array($this->ignoredMyProfileComponents)
            ? $this->ignoredMyProfileComponents
            : $this->evaluate($this->ignoredMyProfileComponents);

        $components = collect($this->registeredMyProfileComponents)
            ->filter(
                fn (string $component) => $component::canView()
            )
            ->except($ignoredComponents)
            ->sortBy(
                fn (string $component) => $component::getSort()
            );

        if ($this->shouldForceTwoFactor()) {
            $components = $components->only(['two_factor_authentication']);
        }

        return $components->all();
    }

    public function passwordUpdateRules(array|Password $rules, bool $requiresCurrentPassword = true): static
    {
        $this->passwordUpdateRules = $rules;
        $this->passwordUpdateRequireCurrent = $requiresCurrentPassword;

        return $this;
    }

    public function getPasswordUpdateRequiresCurrent(): bool
    {
        return $this->passwordUpdateRequireCurrent;
    }

    public function getPasswordUpdateRules(): array
    {
        return $this->passwordUpdateRules ?: [Password::defaults()];
    }

    public function shouldRegisterNavigation(string $key)
    {
        return $this->{$key}['shouldRegisterNavigation'];
    }

    public function getNavigationIcon(string $key)
    {
        return $this->{$key}['navigationIcon'];
    }

    public function getNavigationGroup(string $key)
    {
        return $this->{$key}['navigationGroup'] ?? null;
    }

    protected function getMyProfilePageClass(): string
    {
        return $this->customMyProfilePageClass ?? MyProfilePage::class;
    }
}
