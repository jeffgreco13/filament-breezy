<?php

namespace JeffGreco13\FilamentBreezy;

use Illuminate\Contracts\Cache\Repository;
use PragmaRX\Google2FA\Google2FA;

class FilamentBreezy
{
    protected $engine;

    protected $cache;

    protected static array $passwordRules;

    public function __construct(Google2FA $engine, Repository $cache = null)
    {
        $this->engine = $engine;
        $this->cache = $cache;
    }

    public function getEngine()
    {
        return $this->engine;
    }

    public function generateSecretKey()
    {
        return $this->engine->generateSecretKey();
    }

    public function qrCodeUrl($companyName, $companyEmail, $secret)
    {
        return $this->engine->getQRCodeUrl($companyName, $companyEmail, $secret);
    }

    public function verify($secret, $code)
    {
        $timestamp = $this->engine->verifyKeyNewer(
            $secret,
            $code,
            optional($this->cache)->get($key = 'filament.2fa_codes.'.md5($code))
        );

        if ($timestamp !== false) {
            optional($this->cache)->put($key, $timestamp, ($this->engine->getWindow() ?: 1) * 60);

            return true;
        }

        return false;
    }

    public static function getPasswordRules(): array
    {
        return static::$passwordRules;
    }

    public static function setPasswordRules(array $rules)
    {
        static::$passwordRules = $rules;
    }
}
