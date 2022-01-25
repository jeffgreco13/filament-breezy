<x-filament-breezy::auth-card action="logout">
    <div class="w-full flex justify-center">
        <x-filament::brand />
    </div>

    <div class="space-y-8">
        <h2 class="font-bold tracking-tight text-center text-2xl">
            {{ __('filament-breezy::default.verification.heading') }}
        </h2>
        <div>
            Before proceeding, please check your email for a verification link.
            @unless($hasBeenSent)
                If you did not receive the email, <a class="text-primary-600" href="#" wire:click="resend">click here to request another one</a>.
            @else
                <span class="block text-success-600 font-semibold">{{ __('filament-breezy::default.verification.notification_success') }}</span>
            @endunless
        </div>
    </div>

    {{ $this->form }}

    <x-filament::button type="submit" class="w-full">
        {{ __('filament-breezy::default.verification.submit.label') }}
    </x-filament::button>
</x-filament-breezy::auth-card>
