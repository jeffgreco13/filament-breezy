@props([
    'data'
])
<a x-data="{}"
    x-on:click.prevent="window.navigator.clipboard.writeText(@js($data));$tooltip('{{ __('filament-breezy::default.clipboard.tooltip') }}');"
    href="#" class="flex items-center">
    <x-heroicon-s-clipboard-document class="w-4 mr-2" />
    <span class="">{{ __('filament-breezy::default.clipboard.link') }}</span>
</a>
