<x-filament::section :aside="true" :heading="__('filament-breezy::default.profile.browser_sessions.heading')" :description="__('filament-breezy::default.profile.browser_sessions.subheading')">
    {{ $this->form }}

    <x-filament-actions::modals />
</x-filament::section>
