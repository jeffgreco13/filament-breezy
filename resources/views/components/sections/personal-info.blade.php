<x-filament-breezy::grid-section class="mt-8">

    <x-slot name="title">
        {{ __('filament-breezy::default.profile.personal_info.heading') }}
    </x-slot>

    <x-slot name="description">
        {{ __('filament-breezy::default.profile.personal_info.subheading') }}
    </x-slot>

    <form wire:submit.prevent="updateProfile" class="col-span-2 sm:col-span-1 mt-5 md:mt-0">
        <x-filament::card>

            {{ $this->updateProfileForm }}

            <x-slot name="footer">
                <div class="text-right">
                    <x-filament::button type="submit">
                        {{ __('filament-breezy::default.profile.personal_info.submit.label') }}
                    </x-filament::button>
                </div>
            </x-slot>
        </x-filament::card>
    </form>

</x-filament-breezy::grid-section>
