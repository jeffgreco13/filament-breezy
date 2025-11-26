@script
<script>
    $wire.on('authenticate-with-passkey', async (options) => {
        const optionsJSON = JSON.parse(options)

        const startAuthenticationResponse = await startAuthentication({ optionsJSON });

        $wire.login(startAuthenticationResponse);
    });
</script>
@endscript

