<?php

namespace Jeffgreco13\FilamentBreezy\Livewire;

use Filament\Facades\Filament;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Jeffgreco13\FilamentBreezy\Events\PasskeyUsedToAuthenticate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class PasskeyAction extends Component
{
    public bool $autoPrompt = false;

    public string $passkeyAuthenticationOptions;

    public function mount(): void
    {
        $this->autoPrompt = filament('filament-breezy')->autoPromptPasskeys();
    }

    public function authenticateWithPasskey(): void
    {
        /** @var BreezyCore $plugin */
        $plugin = filament('filament-breezy');

        $options = $plugin->generatePasskeyAuthenticationOptions();

        $this->passkeyAuthenticationOptions = $options;

        $this->dispatch('authenticate-with-passkey', $options);
    }

    public function login(array $startAuthenticationResponse): RedirectResponse|Redirector
    {
        $startAuthenticationResponse = json_encode($startAuthenticationResponse);

        /** @var BreezyCore $plugin */
        $plugin = filament('filament-breezy');

        $passkey = $plugin->findPasskeyToAuthenticate(
            $startAuthenticationResponse,
            $this->passkeyAuthenticationOptions,
        );

        if (! $passkey || ! $passkey->authenticatable) {
            return back()->with('authenticatePasskey::message', __('filament-breezy::default.passkeys.invalid'));
        }

        // Authenticate using Filament's panel auth guard
        Filament::auth()->login($passkey->authenticatable);
        Session::regenerate();

        event(new PasskeyUsedToAuthenticate($passkey));

        return redirect()->intended(Filament::getUrl());
    }

    public function render(): View
    {
        return view('filament-breezy::livewire.passkey-action');
    }
}
