@props(['title', 'description'])
<x-filament-breezy::grid @class(["pt-6 gap-4 filament-breezy-grid-section"]) {{ $attributes }}>

    <x-filament-breezy::column>
        <h3 @class(['text-lg font-medium filament-breezy-grid-title'])>{{ $title }}</h3>

        <p @class(['mt-1 text-sm text-gray-500 filament-breezy-grid-description'])>
            {{ $description }}
        </p>
    </x-filament-breezy::column>

    <x-filament-breezy::column>
        {{ $slot }}
    </x-filament-breezy::column>

</x-filament-breezy::grid>
