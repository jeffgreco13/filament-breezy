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
use Jeffgreco13\FilamentBreezy\Livewire\Passkeys;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Jeffgreco13\FilamentBreezy\Livewire\SanctumTokens;
use Jeffgreco13\FilamentBreezy\Livewire\TwoFactorAuthentication;
use Jeffgreco13\FilamentBreezy\Livewire\UpdatePassword;
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
        if ($this->twoFactorAuthentication && $this->twoFactorAuthenticationMiddleware) {
            $panel->authMiddleware([$this->twoFactorAuthenticationMiddleware]);
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
                $this->myProfileComponents([
                    'sanctum_tokens' => SanctumTokens::class,
                ]);
            }
            if ($this->twoFactorAuthentication) {
                $this->myProfileComponents([
                    'two_factor_authentication' => TwoFactorAuthentication::class,
                ]);
            }
            if ($this->browserSessions) {
                $this->myProfileComponents([
                    'browser_sessions' => BrowserSessions::class,
                ]);
            }
            if ($this->passkeys) {
                $this->myProfileComponents([
                    'passkeys' => Passkeys::class,
                ]);

                FilamentView::registerRenderHook(
                    PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
                    fn (): string => Blade::render('@livewire(\Jeffgreco13\FilamentBreezy\Livewire\PasskeyAction::class)'),
                );
            }

            $this->myProfileComponents([
                'personal_info' => PersonalInfo::class,
                'update_password' => UpdatePassword::class,
            ]);

            if ($this->myProfile['shouldRegisterUserMenu']) {
                if ($panel->hasTenancy()) {
                    $tenantId = request()->route()->parameter('tenant');
                    if ($tenantId && $tenant = app($panel->getTenantModel())::where($panel->getTenantSlugAttribute() ?? 'id', $tenantId)->first()) {
                        $panel->userMenuItems([
                            'profile' => fn (Action $action) => $action->url($this->getMyProfilePageClass()::getUrl(panel: $panel->getId(), tenant: $tenant))->label($this->myProfile['userMenuLabel'] ?? Filament::getUserName(Filament::auth()->user())),
                        ]);
                    }
                } else {
                    $panel->userMenuItems([
                        'profile' => fn (Action $action) => $action->url($this->getMyProfilePageClass()::getUrl())->label($this->myProfile['userMenuLabel'] ?? Filament::getUserName(Filament::auth()->user())),
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
