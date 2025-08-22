<x-filament-panels::page.simple>
    <form wire:submit="authenticate" class="space-y-6">
        {{ $this->form }}

        <div>
            <x-filament::button type="submit" color="primary" class="w-full">
                {{ __('filament-breezy::default.fields.login') }}
            </x-filament::button>
        </div>
    </form>

    <x-filament-actions::modals />
</x-filament-panels::page.simple>
