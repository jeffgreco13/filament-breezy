<x-filament::page>

    <x-filament-breezy::sections.personal-info/>

    <x-filament::hr />

    <x-filament-breezy::sections.passwords/>

    @if(config('filament-breezy.enable_2fa'))
    <x-filament::hr />

    <x-filament-breezy::sections.2fa/>
    @endif

    @if(config('filament-breezy.enable_sanctum'))
    <x-filament::hr />

    <x-filament-breezy::sections.sanctum/>
    @endif

</x-filament::page>
