<x-filament::page>

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

    <hr />

    <x-filament-breezy::grid-section>

        <x-slot name="title">
            {{ __('filament-breezy::default.profile.password.heading') }}
        </x-slot>

        <x-slot name="description">
            {{ __('filament-breezy::default.profile.password.subheading') }}
        </x-slot>

        <form wire:submit.prevent="updatePassword" class="col-span-2 sm:col-span-1 mt-5 md:mt-0">
            <x-filament::card>

                {{ $this->updatePasswordForm }}

                <x-slot name="footer">
                    <div class="text-right">
                        <x-filament::button type="submit">
                            {{ __('filament-breezy::default.profile.password.submit.label') }}
                        </x-filament::button>
                    </div>
                </x-slot>
            </x-filament::card>
        </form>

    </x-filament-breezy::grid-section>

    @if(config('filament-breezy.enable_sanctum'))
    <hr />

    <x-filament-breezy::grid-section class="mt-8">

        <x-slot name="title">
            {{ __('filament-breezy::default.profile.sanctum.title') }}
        </x-slot>

        <x-slot name="description">
            {{ __('filament-breezy::default.profile.sanctum.description') }}
        </x-slot>

        <div class="space-y-3">

            <form wire:submit.prevent="createApiToken" class="col-span-2 sm:col-span-1 mt-5 md:mt-0">

                <x-filament::card>
                    @if($plain_text_token)
                    <input type="text" disabled @class(['w-full py-1 px-3 rounded-lg bg-gray-100 border-gray-200',' dark:bg-gray-900 dark:border-gray-700'=>config('filament.dark_mode')]) name="plain_text_token" value="{{$plain_text_token}}" />
                    @endif

                    {{$this->createApiTokenForm}}

                    <div class="text-right">
                        <x-filament::button type="submit">
                            {{ __('filament-breezy::default.profile.sanctum.create.submit.label') }}
                        </x-filament::button>
                    </div>
                </x-filament::card>
            </form>

            <hr />

            @livewire(\JeffGreco13\FilamentBreezy\Http\Livewire\BreezySanctumTokens::class)

        </div>
    </x-filament-breezy::grid-section>
    @endif

</x-filament::page>
