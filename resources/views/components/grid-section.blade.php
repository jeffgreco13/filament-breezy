@props(['title','description'])
<div @class(["pt-6 gap-4 filament-breezy-grid-section"]) {{ $attributes }}>

    <div>
        <h3 @class(['text-lg font-medium filament-breezy-grid-title'])>{{$title}}</h3>

        <p @class(['mt-1 text-sm text-gray-500 filament-breezy-grid-description'])>
            {{$description}}
        </p>
    </div>

    <div>
        {{ $slot }}
    </div>

</div>
