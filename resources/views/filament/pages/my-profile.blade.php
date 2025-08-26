<x-filament::page>
    <div class="divide-y divide-gray-900/10 dark:divide-white/10 [&>*:not(:first-child)]:pt-6 [&>*:not(:last-child)]:pb-6">
        @foreach ($this->getRegisteredMyProfileComponents() as $component)
            @unless(is_null($component))
                @livewire($component)
            @endunless
        @endforeach
    </div>
</x-filament::page>
