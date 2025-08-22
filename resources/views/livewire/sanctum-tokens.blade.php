<x-filament::section :aside="true" :heading="__('filament-breezy::default.profile.sanctum.title')" :description="__('filament-breezy::default.profile.sanctum.description')">
    @if($plainTextToken)
        <div class="rounded-md bg-primary-50 p-4 dark:bg-primary-400/10 space-y-2 ring-1 ring-primary-100 dark:ring-primary-500/70">
            <p class="text-sm font-medium text-primary-800 dark:text-white">{{ __('filament-breezy::default.profile.sanctum.create.message') }}</p>
            <input type="text" disabled @class(['w-full py-1 px-3 rounded-lg bg-gray-100 border-gray-200 dark:bg-gray-700 dark:border-gray-500']) name="plain_text_token" value="{{ $plainTextToken }}" />
            <div class="flex items-center justify-between">
                <div class="inline-block text-xs">
                    <x-filament-breezy::clipboard-link :data="$plainTextToken" />
                </div>
                <x-filament::button icon="heroicon-s-clipboard-document-check" size="sm" type="button" wire:click="$set('plainTextToken',null)">
                    {{ __('filament-breezy::default.profile.sanctum.copied.label') }}
                </x-filament::button>
            </div>
        </div>

    @endif
    <div style="display: {{ $plainTextToken ? 'none' : '' }}">
        {{ $this->table }}
    </div>
</x-filament::section>
