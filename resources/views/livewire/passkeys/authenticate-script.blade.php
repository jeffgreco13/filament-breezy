@script
<script>
    $wire.on('authenticate-with-passkey', async (options) => {
        try {
            const optionsJSON = JSON.parse(options)
            const startAuthenticationResponse = await startAuthentication({ optionsJSON });
            $wire.login(startAuthenticationResponse);
        } catch (e) {
            if (e.name !== 'AbortError') {
                console.error('Passkey authentication failed:', e);
            }
        }
    });
</script>
@endscript

