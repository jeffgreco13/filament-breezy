<?php

namespace Jeffgreco13\FilamentBreezy;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Closure;
use Filament\Actions\Action;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Forms\Components\FileUpload;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Cache\Repository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Validation\Rules\Password;
use Jeffgreco13\FilamentBreezy\Livewire\BrowserSessions;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Jeffgreco13\FilamentBreezy\Livewire\SanctumTokens;
use Jeffgreco13\FilamentBreezy\Livewire\TwoFactorAuthentication;
use Jeffgreco13\FilamentBreezy\Livewire\UpdatePassword;
use Jeffgreco13\FilamentBreezy\Middleware\MustTwoFactor;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Jeffgreco13\FilamentBreezy\Pages\TwoFactorPage;
use Livewire\Livewire;
use PragmaRX\Google2FA\Google2FA;

class BreezyCore implements Plugin
{
    use EvaluatesClosures;

    protected $engine;

    protected $cache;

    protected $myProfile;

    protected $avatarUploadComponent;

    protected $twoFactorAuthentication;

    protected $twoFactorAuthenticationMiddleware = MustTwoFactor::class;

    protected $forceTwoFactorAuthentication;

    protected $twoFactorRouteAction;

    protected bool $scopeTwoFactorAuthenticationToPanel;

    protected $ignoredMyProfileComponents = [];

    protected $registeredMyProfileComponents = [];

    protected $passwordUpdateRules = [];

    protected bool $passwordUpdateRequireCurrent = true;

    protected $sanctumTokens = false;

    protected $sanctumPermissions = ['create', 'view', 'update', 'delete'];

    protected $browserSessions = false;

    protected ?string $customMyProfilePageClass = null;

    public function __construct(Google2FA $engine, ?Repository $cache = null)
    {
        $this->engine = $engine;
        $this->cache = $cache;
    }

    public function getId(): string
    {
        return 'filament-breezy';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages($this->preparePages());
        // If TwoFactor is enabled, register the middleware.
        if ($this->twoFactorAuthentication) {
            if ($this->twoFactorAuthenticationMiddleware) {
                $panel->authMiddleware([$this->twoFactorAuthenticationMiddleware]);
            }

            Livewire::component('two-factor-page', TwoFactorPage::class);
        }
    }

    protected function preparePages(): array
    {
        $collection = collect();
        if ($this->myProfile) {
            $collection->push($this->getMyProfilePageClass());
        }

        return $collection->toArray();
    }

    public function boot(Panel $panel): void
    {
        if ($this->myProfile) {
            if ($this->sanctumTokens) {
                Livewire::component('sanctum_tokens', SanctumTokens::class);
                $this->myProfileComponents([
                    'sanctum_tokens' => SanctumTokens::class,
                ]);
            }
            if ($this->twoFactorAuthentication) {
                Livewire::component('two_factor_authentication', TwoFactorAuthentication::class);
                $this->myProfileComponents([
                    'two_factor_authentication' => TwoFactorAuthentication::class,
                ]);
            }
            if ($this->browserSessions) {
                Livewire::component('browser_sessions', BrowserSessions::class);
                $this->myProfileComponents([
                    'browser_sessions' => BrowserSessions::class,
                ]);
            }

            Livewire::component('personal_info', PersonalInfo::class);
            Livewire::component('update_password', UpdatePassword::class);
            $this->myProfileComponents([
                'personal_info' => PersonalInfo::class,
                'update_password' => UpdatePassword::class,
            ]);

            if ($this->myProfile['shouldRegisterUserMenu']) {
                if ($panel->hasTenancy()) {
                    $tenantId = request()->route()->parameter('tenant');
                    if ($tenantId && $tenant = app($panel->getTenantModel())::where($panel->getTenantSlugAttribute() ?? 'id', $tenantId)->first()) {
                        $panel->userMenuItems([
                            'profile' => fn (Action $action) => $action->url($this->getMyProfilePageClass()::getUrl(panel: $panel->getId(), tenant: $tenant))->label($this->myProfile['userMenuLabel'] ?? Filament::getUserName(auth()->user())),
                        ]);
                    }
                } else {
                    $panel->userMenuItems([
                        'profile' => fn (Action $action) => $action->url($this->getMyProfilePageClass()::getUrl())->label($this->myProfile['userMenuLabel'] ?? Filament::getUserName(auth()->user())),
                    ]);
                }
            }
        }
    }

    public function auth()
    {
        return Filament::getCurrentOrDefaultPanel()->auth();
    }

    public function getCurrentPanel()
    {
        return Filament::getCurrentOrDefaultPanel();
    }

    public function myProfile(bool $condition = true, bool $shouldRegisterUserMenu = true, bool $shouldRegisterNavigation = false, bool $hasAvatars = false, string $slug = 'my-profile', ?string $navigationGroup = null, ?string $userMenuLabel = null): static
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

    public function getNavigationGroup(string $key)
    {
        return $this->{$key}['navigationGroup'] ?? null;
    }

    public function enableTwoFactorAuthentication(bool $condition = true, bool|Closure $force = false, string|Closure|array|null $action = TwoFactorPage::class, string|false $authMiddleware = MustTwoFactor::class, bool $scopeToPanel = true): static
    {
        $this->twoFactorAuthentication = $condition;
        $this->forceTwoFactorAuthentication = $force;
        $this->twoFactorRouteAction = $action;
        $this->twoFactorAuthenticationMiddleware = $authMiddleware;
        $this->scopeTwoFactorAuthenticationToPanel = $scopeToPanel;

        return $this;
    }

    public function getForceTwoFactorAuthentication(): ?bool
    {
        return $this->evaluate($this->forceTwoFactorAuthentication);
    }

    public function getTwoFactorRouteAction(): string|Closure|array|null
    {
        return $this->twoFactorRouteAction;
    }

    public function getEngine(): Google2FA
    {
        return $this->engine;
    }

    public function generateSecretKey(): string
    {
        return $this->engine->generateSecretKey();
    }

    public function getTwoFactorQrCodeSvg(string $url): string
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(150, 1, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd
            )
        ))->writeString($url);

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    public function getQrCodeUrl($companyName, $companyEmail, $secret): string
    {
        return $this->engine->getQRCodeUrl($companyName, $companyEmail, $secret);
    }

    public function verify(string $code, ?Authenticatable $user = null): bool
    {
        if (is_null($user)) {
            $user = Filament::auth()->user();
        }
        $secret = $user->breezySession?->two_factor_secret;

        $timestamp = $this->engine->verifyKeyNewer(
            $secret,
            $code,
            optional($this->cache)->get($key = 'filament.2fa_codes.'.md5($code)),
        );

        if ($timestamp !== false) {
            optional($this->cache)->put($key, $timestamp, ($this->engine->getWindow() ?: 1) * 60);

            return true;
        }

        return false;
    }

    public function verifyRecoveryCode(string $code, ?Authenticatable $user = null): bool
    {
        if (is_null($user)) {
            $user = Filament::auth()->user();
        }
        $recoveryCodes = $user->breezySession?->two_factor_recovery_codes;

        return (bool) collect($recoveryCodes)->first(function ($recoveryCode) use ($code) {
            return hash_equals($code, $recoveryCode) ? $recoveryCode : false;
        });
    }

    public function shouldForceTwoFactor(): bool
    {
        $forceTwoFactor = $this->getForceTwoFactorAuthentication();

        if ($this->getCurrentPanel()->isEmailVerificationRequired()) {
            return $forceTwoFactor && ! $this->auth()->user()?->hasConfirmedTwoFactor() && $this->auth()->user()?->hasVerifiedEmail();
        }

        return $forceTwoFactor && ! $this->auth()->user()?->hasConfirmedTwoFactor();
    }

    public function scopeTwoFactorAuthenticationToPanel(): bool
    {
        return $this->scopeTwoFactorAuthenticationToPanel;
    }

    public function enableSanctumTokens(bool $condition = true, null|array|Closure $permissions = null): static
    {
        $this->sanctumTokens = $condition;
        if (! is_null($permissions)) {
            $this->sanctumPermissions = $permissions;
        }

        return $this;
    }

    public function getSanctumPermissions(): array
    {
        return collect($this->evaluate($this->sanctumPermissions))->mapWithKeys(function ($item, $key) {
            $key = is_string($key) ? $key : strtolower($item);
            $translationKey = "filament-breezy::default.permissions.{$key}";
            $translatedValue = __($translationKey);

            // If translation doesn't exist, fall back to the original item
            $displayValue = $translatedValue !== $translationKey ? $translatedValue : $item;

            return [$key => $displayValue];
        })->toArray();
    }

    protected function getMyProfilePageClass(): string
    {
        return $this->customMyProfilePageClass ?? MyProfilePage::class;
    }

    public function enableBrowserSessions(bool $condition = true): static
    {
        $this->browserSessions = $condition;

        return $this;
    }
}
