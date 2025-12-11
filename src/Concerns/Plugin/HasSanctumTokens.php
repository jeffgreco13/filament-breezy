<?php

namespace Jeffgreco13\FilamentBreezy\Concerns\Plugin;

use Closure;

trait HasSanctumTokens
{
    protected bool $sanctumTokens = false;

    protected array|Closure $sanctumPermissions = ['create', 'view', 'update', 'delete'];

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
}
