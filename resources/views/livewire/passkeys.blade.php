<x-filament-breezy::grid-section md=2 :title="__('filament-breezy::default.profile.passkeys.title')" :description="__('filament-breezy::default.profile.passkeys.description')">
        <div>
            {{ $this->table }}
        </div>
</x-filament-breezy::grid-section>
@script
<script>
    Livewire.on('passkeyPropertiesValidated', async function (eventData) {
        const passkeyOptions = eventData[0].passkeyOptions;

        const passkey = await startRegistration({ optionsJSON: passkeyOptions });

        @this.call('storePasskey', JSON.stringify(passkey));
    });
</script>
@endscript
