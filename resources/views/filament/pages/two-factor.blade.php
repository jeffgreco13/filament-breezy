<div>
    <form wire:submit.prevent="authenticate" class="grid gap-y-8">
        {{ $this->form }}

        <x-filament::button type="submit" form="authenticate">Submit</x-filament::button>
    </form>
</div>
