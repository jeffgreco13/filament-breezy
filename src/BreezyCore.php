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
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Cache\Repository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Jeffgreco13\FilamentBreezy\Livewire\BrowserSessions;
use Jeffgreco13\FilamentBreezy\Livewire\PasskeyAction;
use Jeffgreco13\FilamentBreezy\Livewire\Passkeys;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Jeffgreco13\FilamentBreezy\Livewire\SanctumTokens;
use Jeffgreco13\FilamentBreezy\Livewire\TwoFactorAuthentication;
use Jeffgreco13\FilamentBreezy\Livewire\UpdatePassword;
use Jeffgreco13\FilamentBreezy\Middleware\MustTwoFactor;
use Jeffgreco13\FilamentBreezy\Models\Passkey;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Jeffgreco13\FilamentBreezy\Pages\TwoFactorPage;
use Livewire\Livewire;
use PragmaRX\Google2FA\Google2FA;
use Symfony\Component\Serializer\Serializer;
use Throwable;
use Webauthn\AttestationStatement\AttestationStatementSupportManager;
use Webauthn\AuthenticatorAssertionResponse;
use Webauthn\AuthenticatorAssertionResponseValidator;
use Webauthn\AuthenticatorAttestationResponse;
use Webauthn\AuthenticatorAttestationResponseValidator;
use Webauthn\CeremonyStep\CeremonyStepManagerFactory;
use Webauthn\Denormalizer\WebauthnSerializerFactory;
use Webauthn\PublicKeyCredential;
use Webauthn\PublicKeyCredentialCreationOptions;
use Webauthn\PublicKeyCredentialRequestOptions;
use Webauthn\PublicKeyCredentialRpEntity;
use Webauthn\PublicKeyCredentialSource;
use Webauthn\PublicKeyCredentialUserEntity;

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

    protected $passkeys = false;

    protected $scopePasskeysToPanel = true;

    protected string $passkeyRelyingPartyName;

    protected string $passkeyRelyingPartyId;

    protected ?string $passkeyRelyingPartyIcon;

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
        $panel->pages($this->preparePages());

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
            if ($this->passkeys) {
                Livewire::component('passkeys', Passkeys::class);
                Livewire::component('passkey_action', PasskeyAction::class);

                $this->myProfileComponents([
                    'passkeys' => Passkeys::class,
                ]);

                FilamentView::registerRenderHook(
                    PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                    fn (): string => Blade::render('@livewire(\Jeffgreco13\FilamentBreezy\Livewire\PasskeyAction::class)'),
                );
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

    public function enablePasskeys(bool $condition = true, ?string $relyingPartyName = null, ?string $relyingPartyId = null, ?string $relyingPartyIcon = null, bool $scopeToPanel = true): static
    {
        $this->passkeys = $condition;
        $this->scopePasskeysToPanel = $scopeToPanel;
        $this->passkeyRelyingPartyName = $relyingPartyName ?? config('app.name');
        $this->passkeyRelyingPartyId = $relyingPartyId ?? parse_url(config('app.url'), PHP_URL_HOST);
        $this->passkeyRelyingPartyIcon = $relyingPartyIcon;

        return $this;
    }

    public function scopePasskeysToPanel(): bool
    {
        return $this->scopePasskeysToPanel;
    }

    public function passkeyRelyingPartyName(): string
    {
        return $this->passkeyRelyingPartyName;
    }

    public function passkeyRelyingPartyId(): string
    {
        return $this->passkeyRelyingPartyId;
    }

    public function passkeyRelyingPartyIcon(): ?string
    {
        return $this->passkeyRelyingPartyIcon;
    }

    public function passkeySerializer(): Serializer
    {
        $attestationStatementSupportManager = AttestationStatementSupportManager::create();

        /** @var Serializer $serializer */
        $serializer = (new WebauthnSerializerFactory($attestationStatementSupportManager))->create();

        return $serializer;
    }

    public function passkeyRelatedPartyEntity(): PublicKeyCredentialRpEntity
    {
        return new PublicKeyCredentialRpEntity(
            name: $this->passkeyRelyingPartyName(),
            id: $this->passkeyRelyingPartyId(),
            icon: $this->passkeyRelyingPartyIcon(),
        );
    }

    public function passkeyGenerateUserEntity(): PublicKeyCredentialUserEntity
    {
        return new PublicKeyCredentialUserEntity(
            name: $this->auth()->user()?->email,
            id: $this->auth()->user()?->id,
            displayName: $this->auth()->user()?->name,
        );
    }

    public function generatePasskeyRegisterOptions(): string
    {
        $options = new PublicKeyCredentialCreationOptions(
            rp: $this->passkeyRelatedPartyEntity(),
            user: $this->passkeyGenerateUserEntity(),
            challenge: Str::random(),
        );

        return $this->passkeySerializer()->serialize($options, 'json');
    }

    public function generatePasskeyAuthenticationOptions(): string
    {
        $options = new PublicKeyCredentialRequestOptions(
            challenge: Str::random(),
            rpId: $this->passkeyRelyingPartyId(),
            allowCredentials: [],
        );

        return $this->passkeySerializer()->serialize($options, 'json');
    }

    public function storePasskey(Authenticatable $authenticatable, string $passkeyJson, string $passkeyOptionsJson, string $hostName, array $additionalProperties = []): Passkey
    {
        $publicKeyCredentialSource = $this->passkeyDeterminePublicKeyCredentialSource(
            $passkeyJson,
            $passkeyOptionsJson,
            $hostName
        );

        /** @var Passkey $passkey */
        $passkey = Passkey::create([
            ...$additionalProperties,
            'authenticatable_id' => $this->auth()->id(),
            'authenticatable_type' => $this->auth()->user()->getMorphClass(),
            'data' => $publicKeyCredentialSource,
        ]);

        return $passkey;
    }

    public function passkeyDeterminePublicKeyCredentialSource(string $passkeyJson, string $passkeyOptionsJson, string $hostName)
    {
        $passkeyOptions = $this->getPasskeyOptions($passkeyOptionsJson);

        $publicKeyCredential = $this->getPasskey($passkeyJson);

        if (! $publicKeyCredential->response instanceof AuthenticatorAttestationResponse) {
            throw new \Exception('The given passkey is not a valid public key credential.');
        }

        $csmFactory = new CeremonyStepManagerFactory;
        $creationCsm = $csmFactory->creationCeremony();

        try {
            $publicKeyCredentialSource = AuthenticatorAttestationResponseValidator::create($creationCsm)->check(
                authenticatorAttestationResponse: $publicKeyCredential->response,
                publicKeyCredentialCreationOptions: $passkeyOptions,
                host: $hostName,
            );
        } catch (Throwable $exception) {
            throw new \Exception('The given passkey could not be validated.');
        }

        return $publicKeyCredentialSource;
    }

    protected function getPasskeyOptions(string $passkeyOptionsJson): PublicKeyCredentialCreationOptions
    {
        if (! json_validate($passkeyOptionsJson)) {
            throw new \Exception('The given passkey should be formatted as json.');
        }

        /** @var PublicKeyCredentialCreationOptions $passkeyOptions */
        $passkeyOptions = $this->passkeySerializer()->deserialize(
            $passkeyOptionsJson,
            PublicKeyCredentialCreationOptions::class,
            'json',
        );

        return $passkeyOptions;
    }

    protected function getPasskey(string $passkeyJson): PublicKeyCredential
    {
        if (! json_validate($passkeyJson)) {
            throw new \Exception('The given passkey should be formatted as json.');
        }

        /** @var PublicKeyCredential $publicKeyCredential */
        $publicKeyCredential = $this->passkeySerializer()->deserialize(
            $passkeyJson,
            PublicKeyCredential::class,
            'json',
        );

        return $publicKeyCredential;
    }

    public function findPasskeyToAuthenticate(string $publicKeyCredentialJson, string $passkeyOptionsJson): ?Passkey
    {
        $publicKeyCredential = $this->determinePublicKeyCredential($publicKeyCredentialJson);

        if (! $publicKeyCredential) {
            return null;
        }

        $passkey = $this->findPasskey($publicKeyCredential);

        if (! $passkey) {
            return null;
        }

        /** @var PublicKeyCredentialRequestOptions $passkeyOptions */
        $passkeyOptions = $this->passkeySerializer()->deserialize(
            $passkeyOptionsJson,
            PublicKeyCredentialRequestOptions::class,
            'json',
        );

        $publicKeyCredentialSource = $this->determinePublicKeyCredentialSource(
            $publicKeyCredential,
            $passkeyOptions,
            $passkey,
        );

        if (! $publicKeyCredentialSource) {
            return null;
        }

        $this->updatePasskey($passkey, $publicKeyCredentialSource);

        return $passkey;
    }

    public function determinePublicKeyCredential(string $publicKeyCredentialJson): ?PublicKeyCredential
    {
        $publicKeyCredential = $this->passkeySerializer()->deserialize(
            $publicKeyCredentialJson,
            PublicKeyCredential::class,
            'json',
        );

        if (! $publicKeyCredential->response instanceof AuthenticatorAssertionResponse) {
            return null;
        }

        return $publicKeyCredential;
    }

    protected function findPasskey(PublicKeyCredential $publicKeyCredential): ?Passkey
    {
        return Passkey::firstWhere('credential_id', mb_convert_encoding($publicKeyCredential->rawId, 'UTF-8'));
    }

    protected function determinePublicKeyCredentialSource(PublicKeyCredential $publicKeyCredential, PublicKeyCredentialRequestOptions $passkeyOptions, Passkey $passkey): ?PublicKeyCredentialSource
    {
        $csmFactory = new CeremonyStepManagerFactory;
        $requestCsm = $csmFactory->requestCeremony();

        try {
            $validator = AuthenticatorAssertionResponseValidator::create($requestCsm);

            $publicKeyCredentialSource = $validator->check(
                publicKeyCredentialSource: $passkey->data,
                authenticatorAssertionResponse: $publicKeyCredential->response,
                publicKeyCredentialRequestOptions: $passkeyOptions,
                host: parse_url(config('app.url'), PHP_URL_HOST),
                userHandle: null,
            );
        } catch (Throwable) {
            return null;
        }

        return $publicKeyCredentialSource;
    }

    protected function updatePasskey(Passkey $passkey, PublicKeyCredentialSource $publicKeyCredentialSource): self
    {
        $passkey->update([
            'data' => $publicKeyCredentialSource,
            'last_used_at' => now(),
        ]);

        return $this;
    }
}
