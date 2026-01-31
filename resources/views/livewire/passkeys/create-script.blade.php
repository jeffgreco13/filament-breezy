@script
<script>
    Livewire.on('passkeyPropertiesValidated', async function (eventData) {
        try {
            const passkeyOptions = eventData[0].passkeyOptions;
            const passkey = await startRegistration({ optionsJSON: passkeyOptions });
            @this.call('storePasskey', JSON.stringify(passkey));
        } catch (e) {
            if (e.name !== 'AbortError') {
                console.error('Passkey registration failed:', e);
            }
        }
    });
</script>
@endscript
