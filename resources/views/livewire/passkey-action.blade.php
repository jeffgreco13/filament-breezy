<div>
    @if(\Filament\Facades\Filament::getCurrentOrDefaultPanel()?->hasPlugin('filament-breezy'))
        <div>
            <x-filament::button class="w-full" color="gray" wire:click="authenticateWithPasskey">
                {{ __('filament-breezy::default.passkeys.authenticate_using_passkey.label') }}
            </x-filament::button>

            @if($message = session()->get('authenticatePasskey::message'))
                <div class="mt-2 text-sm text-danger-600">
                    {{ $message }}
                </div>
            @endif
        </div>

        @include('filament-breezy::livewire.passkeys.authenticate-script')
    @endif
</div>
