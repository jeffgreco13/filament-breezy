@props(['title','description'])
<x-grid @class(["pt-6 gap-4 filament-breezy-grid-section"]) {{ $attributes }}>

    <x-grid.column>
        <h3 @class(['text-lg font-medium filament-breezy-grid-title'])>{{$title}}</h3>

        <p @class(['mt-1 text-sm text-gray-500 filament-breezy-grid-description'])>
            {{$description}}
        </p>
    </x-grid.column>

    <x-grid.column>
        {{ $slot }}
    </x-grid.column>

</x-grid>
