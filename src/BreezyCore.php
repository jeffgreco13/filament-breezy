<?php

namespace Jeffgreco13\FilamentBreezy;

use Filament\Actions\Action;
use Filament\Contracts\Plugin as FilamentPlugin;
use Filament\Facades\Filament;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\Blade;
use Jeffgreco13\FilamentBreezy\Concerns\Plugin;
use Jeffgreco13\FilamentBreezy\Livewire\BrowserSessions;
use Jeffgreco13\FilamentBreezy\Livewire\PasskeyAction;
use Jeffgreco13\FilamentBreezy\Livewire\Passkeys;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Jeffgreco13\FilamentBreezy\Livewire\SanctumTokens;
use Jeffgreco13\FilamentBreezy\Livewire\TwoFactorAuthentication;
use Jeffgreco13\FilamentBreezy\Livewire\UpdatePassword;
use Jeffgreco13\FilamentBreezy\Pages\TwoFactorPage;
use Livewire\Livewire;
use PragmaRX\Google2FA\Google2FA;

class BreezyCore implements FilamentPlugin
{
    use EvaluatesClosures;
    use Plugin\HasBrowserSessions;
    use Plugin\HasMyProfile;
    use Plugin\HasPasskeys;
    use Plugin\HasSanctumTokens;
    use Plugin\HasTwoFactorAuthentication;

    protected Google2FA $engine;

    protected ?Repository $cache;

    protected $passwordUpdateRules = [];

    protected bool $passwordUpdateRequireCurrent = true;

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
}
