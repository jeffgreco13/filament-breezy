<x-filament-breezy::auth-card action="submit">
    <div class="w-full flex justify-center">
        <x-filament::brand />
    </div>

    <div>
        <h2 class="font-bold tracking-tight text-center text-2xl">
            {{ __('filament-breezy::default.reset_password.heading') }}
        </h2>
        <p class="mt-2 text-sm text-center">
            Or <a class="text-primary-600" href="{{route("filament.auth.login")}}">sign in to your account</a>
        </p>
    </div>

    @unless($hasBeenSent)
    {{ $this->form }}

    <x-filament::button type="submit" class="w-full">
        {{ __('filament-breezy::default.reset_password.submit.label') }}
    </x-filament::button>
    @else
    <span class="block text-center text-success-600 font-semibold">{{ __('filament-breezy::default.reset_password.notification_success') }}</span>
    @endunless
</x-filament-breezy::auth-card>
