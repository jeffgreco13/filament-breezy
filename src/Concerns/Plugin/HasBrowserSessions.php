<?php

namespace Jeffgreco13\FilamentBreezy\Concerns\Plugin;

trait HasBrowserSessions
{
    protected bool $browserSessions = false;

    public function enableBrowserSessions(bool $condition = true): static
    {
        $this->browserSessions = $condition;

        return $this;
    }
}
