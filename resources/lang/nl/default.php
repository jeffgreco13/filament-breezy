<?php

return [
    'login' => [
        'username_or_email' => 'Gebruikersnaam of wachtwoord',
        'forgot_password_link' => 'Wachtwoord vergeten?',
        'create_an_account' => 'account aanmaken',
    ],
    'password_confirm' => [
        'heading' => 'Bevestig wachtwoord',
        'description' => 'Bevestig je wachtwoord om deze actie te voltooien.',
        'current_password' => 'Huidig wachtwoord',
    ],
    'two_factor' => [
        'heading' => 'Twee-factorenauthenticatie',
        'description' => 'Bevestig de toegang tot je account door de authenticatiecode in te voeren die door je authenticatietoepassing is verstrekt.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Twee-factorenauthenticatie',
            'description' => 'Bevestig de toegang tot je account door één van je noodherstelcodes in te voeren.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Apparaat kwijt?',
        'recovery_code_link' => 'Gebruik een herstelcode',
        'back_to_login_link' => 'Terug naar Inloggen',
    ],
    'registration' => [
        'title' => 'Registreren',
        'heading' => 'Nieuw account aanmaken',
        'submit' => [
            'label' => 'Aanmelden',
        ],
        'notification_unique' => 'Een account met dit e-mailaddres bestaat al. Graag inloggen.',
    ],
    'reset_password' => [
        'title' => 'Wachtwoord vergeten',
        'heading' => 'Wachtwoord opnieuw instellen',
        'submit' => [
            'label' => 'Verzenden',
        ],
        'notification_error' => 'Fout bij het resetten van het wachtwoord, probeer het later nogmaals.',
        'notification_error_link_text' => 'Probeer opnieuw',
        'notification_success' => 'Controleer je e-mail voor instructies!',
    ],
    'verification' => [
        'title' => 'E-mail bevestigen',
        'heading' => 'Email bevestiging verplicht',
        'submit' => [
            'label' => 'Uitloggen',
        ],
        'notification_success' => 'Er is een e-mail verstuurd met instructies om je e-mailadres te verifiëren.',
        'notification_resend' => 'Verificatie email opnieuw verstuurd.',
        'before_proceeding' => 'Voordat je verder gaat, controleer je e-mail voor een verificatie link.',
        'not_receive' => 'Indien je geen e-mail ontvangen hebt,',
        'request_another' => 'klik hier om een nieuwe aan te vragen',
    ],
    'profile' => [
        'account' => 'Account',
        'profile' => 'Profiel',
        'subheading' => 'Beheer je gebruikers profiel hier.',
        'my_profile' => 'Mijn profiel',
        'personal_info' => [
            'heading' => 'Persoonlijke informatie',
            'subheading' => 'Beheer je persoonlijke informatie.',
            'submit' => [
                'label' => 'Opslaan',
            ],
            'notify' => 'Profiel succesvol bijgewerkt!',
        ],
        'password' => [
            'heading' => 'Wachtwoord',
            'subheading' => 'Minimale lengte is 8 karakters',
            'submit' => [
                'label' => 'Opslaan',
            ],
            'notify' => 'Wachtwoord succesvol bijgewerkt!',
        ],
        '2fa' => [
            'title' => 'Tweefactorenauthenticatie',
            'description' => 'Beheer tweefactorenauthenticatie voor je account (aanbevolen).',
            'actions' => [
                'enable' => 'Inschakelen',
                'regenerate_codes' => 'Codes opnieuw genereren',
                'disable' => 'Uitschakelen',
                'confirm_finish' => 'Bevestigen',
                'cancel_setup' => 'Annuleren',
            ],
            'setup_key' => 'Sleutel: ',
            'not_enabled' => [
                'title' => 'Je hebt tweefactorauthenticatie niet ingeschakeld.',
                'description' => 'Wanneer tweefactorauthenticatie is ingeschakeld, word je tijdens de authenticatie om een veilige, willekeurige token gevraagd. Je kunt deze token ophalen uit bijvoorbeeld de Google Authenticator-app van je telefoon.',
            ],
            'finish_enabling' => [
                'title' => 'Voltooi het inschakelen van tweefactorauthenticatie.',
                'description' => 'Om het inschakelen van tweefactorauthenticatie te voltooien, scan je de volgende QR-code met behulp van de authenticatietoepassing van je telefoon of voer je de configuratiesleutel in en geef je de gegenereerde OTP-code op.',
            ],
            'enabled' => [
                'title' => 'Je hebt tweefactorauthenticatie ingeschakeld!',
                'description' => 'Tweefactorauthenticatie is nu ingeschakeld. Dat bevordert de veiligheid van je account.',
                'store_codes' => 'Bewaar deze herstelcodes in een veilige wachtwoordbeheerder. Ze kunnen worden gebruikt om de toegang tot je account te herstellen als je geen toegang meer hebt tot je apparaat voor tweefactorauthenticatie.',
                'show_codes' => 'Toon herstelcodes',
                'hide_codes' => 'Herstelcodes verbergen',
            ],
            'confirmation' => [
                'success_notification' => 'Code geverifieerd. Tweefactorauthenticatie ingeschakeld.',
                'invalid_code' => 'De code die je hebt ingevoerd is ongeldig.',
            ],
        ],
        'sanctum' => [
            'title' => 'API Tokens',
            'description' => 'Beheer API tokens voor externe-toegang tot je account. LET OP: je token is eenmalig zichbaar na aanmaken. Indien je je token vergeet zul je deze moeten verwijderen en een nieuwe moeten aanmaken.',
            'create' => [
                'notify' => 'Token succesvol aangemaakt!',
                'submit' => [
                    'label' => 'Aanmaken',
                ],
            ],
            'update' => [
                'notify' => 'Token succesvol bijgewerkt!',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Kopieer naar klembord',
        'tooltip' => 'Gekopieerd!',
    ],
    'fields' => [
        'name' => 'Naam',
        'email' => 'E-mailadres',
        'password' => 'Wachtwoord',
        'password_confirm' => 'Wachtwoord bevestigen',
        'new_password' => 'Nieuw wachtwoord',
        'new_password_confirmation' => 'Nieuw wachtwoord bevestigen',
        'token_name' => 'Token naam',
        'abilities' => 'Mogelijkheden',
        '2fa_code' => 'Code',
        '2fa_recovery_code' => 'Herstelcode',
        'created' => 'Aangemaakt',
        'expires' => 'Verloopt',
    ],
    'or' => 'Of',
    'cancel' => 'Annuleren',
];
