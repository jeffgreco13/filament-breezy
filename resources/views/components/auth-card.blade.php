@props(['action'])
<div @class(['flex items-center justify-center min-h-screen bg-gray-100 text-gray-900','dark:bg-gray-900 dark:text-white' => config('filament.dark_mode')])>

    <x-filament::notification-manager />

    <div class="p-2 max-w-{{config('filament-breezy.auth_card_max_w')??'md'}} space-y-8 w-screen">
        <form wire:submit.prevent="{{$action}}" @class(['p-8 space-y-8 bg-white border border-gray-300 shadow rounded-2xl', 'dark:bg-gray-800 dark:border-gray-700' => config('filament.dark_mode')])>
            {{$slot}}
        </form>
        <x-filament::footer />
    </div>
</div>
