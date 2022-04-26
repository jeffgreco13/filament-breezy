<?php

namespace JeffGreco13\FilamentBreezy\Traits;

use BaconQrCode\Renderer\Color\Rgb;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use JeffGreco13\FilamentBreezy\FilamentBreezy;

trait TwoFactorAuthenticatable
{
    public function enableTwoFactorAuthentication(FilamentBreezy $breezy)
    {
        $this->forceFill([
            'two_factor_secret' => encrypt($breezy->getEngine()->generateSecretKey()),
            'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
        ])->save();
    }

    public function disableTwoFactorAuthentication()
    {
        $this->forceFill([
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'two_factor_confirmed_at' => null,
        ])->save();
    }

    public function getHasEnabledTwoFactorAttribute()
    {
        return ! is_null($this->two_factor_secret);
    }

    public function getHasConfirmedTwoFactorAttribute()
    {
        return ! is_null($this->two_factor_secret) && ! is_null($this->two_factor_confirmed_at);
    }

    public function generateRecoveryCodes()
    {
        return encrypt(json_encode(Collection::times(8, function () {
            return Str::random(10).'-'.Str::random(10);
            ;
        })->all()));
    }

    public function reGenerateRecoveryCodes()
    {
        $this->forceFill([
            'two_factor_recovery_codes' => $this->generateRecoveryCodes(),
        ])->save();
    }

    public function recoveryCodes()
    {
        return json_decode(decrypt($this->two_factor_recovery_codes), true);
    }

    public function twoFactorQrCodeSvg(FilamentBreezy $breezy)
    {
        $svg = (new Writer(
            new ImageRenderer(
                new RendererStyle(192, 1, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))),
                new SvgImageBackEnd()
            )
        ))->writeString($this->twoFactorQrCodeUrl($breezy));

        return trim(substr($svg, strpos($svg, "\n") + 1));
    }

    public function twoFactorQrCodeUrl(FilamentBreezy $breezy)
    {
        return $breezy->qrCodeUrl(
            config('app.name'),
            $this->email,
            decrypt($this->two_factor_secret)
        );
    }

    public function verifyTwoFactor($code, FilamentBreezy $breezy)
    {
        return $breezy->verify(decrypt($this->two_factor_secret), $code);
    }
}
