<?php

namespace Jeffgreco13\FilamentBreezy\Concerns\Plugin;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Jeffgreco13\FilamentBreezy\Middleware\MustTwoFactor;
use Jeffgreco13\FilamentBreezy\Pages\TwoFactorPage;
use PragmaRX\Google2FA\Google2FA;

trait HasTwoFactorAuthentication
{
    protected bool $twoFactorAuthentication = false;

    protected string|false $twoFactorAuthenticationMiddleware = MustTwoFactor::class;

    protected bool|Closure $forceTwoFactorAuthentication = false;

    protected string|Closure|array|null $twoFactorRouteAction = TwoFactorPage::class;

    protected bool $scopeTwoFactorAuthenticationToPanel = true;

    public function enableTwoFactorAuthentication(bool $condition = true, bool|Closure $force = false, string|Closure|array|null $action = TwoFactorPage::class, string|false $authMiddleware = MustTwoFactor::class, bool $scopeToPanel = true): static
    {
        $this->twoFactorAuthentication = $condition;
        $this->forceTwoFactorAuthentication = $force;
        $this->twoFactorRouteAction = $action;
        $this->twoFactorAuthenticationMiddleware = $authMiddleware;
        $this->scopeTwoFactorAuthenticationToPanel = $scopeToPanel;

        return $this;
    }

    public function twoFactorAuthenticationEnabled(): bool
    {
        return $this->twoFactorAuthentication;
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
            $user = $this->auth()->user();
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
            $user = $this->auth()->user();
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
}
