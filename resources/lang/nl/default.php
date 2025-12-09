<?php

declare(strict_types=1);

return [
    'password_confirm' => [
        'heading' => 'Bevestig wachtwoord',
        'description' => 'Bevestig je wachtwoord om deze actie te voltooien.',
        'current_password' => 'Huidig wachtwoord',
    ],
    'two_factor' => [
        'heading' => 'Tweestapsverificatie',
        'description' => 'Bevestig de toegang tot je account door de authenticatiecode in te voeren die door je authenticatietoepassing is verstrekt.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Tweestapsverificatie',
            'description' => 'Bevestig de toegang tot je account door een van je noodherstelcodes in te voeren.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Apparaat kwijt?',
        'recovery_code_link' => 'Gebruik een herstelcode',
        'back_to_login_link' => 'Terug naar inloggen',
    ],
    'profile' => [
        'account' => 'Account',
        'profile' => 'Profiel',
        'subheading' => 'Beheer je gebruikersprofiel hier.',
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
            'title' => 'Tweestapsverificatie',
            'description' => 'Beheer tweestapsverificatie voor je account (aanbevolen).',
            'actions' => [
                'enable' => 'Inschakelen',
                'regenerate_codes' => 'Codes opnieuw genereren',
                'disable' => 'Uitschakelen',
                'confirm_finish' => 'Bevestigen',
                'cancel_setup' => 'Annuleren',
                'confirm' => 'Bevestigen',
            ],
            'setup_key' => 'Sleutel: ',
            'must_enable' => 'Je moet tweestapsverificatie instellen om deze applicatie te gebruiken.',
            'not_enabled' => [
                'title' => 'Je hebt tweestapsverificatie niet ingeschakeld.',
                'description' => 'Wanneer tweestapsverificatie is ingeschakeld, word je tijdens de authenticatie om een veilige, willekeurige token gevraagd. Je kunt deze token ophalen uit bijvoorbeeld de Google Authenticator-app van je telefoon.',
            ],
            'finish_enabling' => [
                'title' => 'Voltooi het inschakelen van tweestapsverificatie.',
                'description' => 'Om het inschakelen van tweestapsverificatie te voltooien, scan je de volgende QR-code met behulp van de authenticatietoepassing van je telefoon of voer je de configuratiesleutel in en geef je de gegenereerde OTP-code op.',
            ],
            'enabled' => [
                'notify' => 'Tweestapsverificatie ingeschakeld.',
                'title' => 'Je hebt tweestapsverificatie ingeschakeld!',
                'description' => 'Tweestapsverificatie is nu ingeschakeld. Dat bevordert de veiligheid van je account.',
                'store_codes' => 'Bewaar deze herstelcodes in een veilige wachtwoordbeheerder. Ze kunnen worden gebruikt om de toegang tot je account te herstellen als je geen toegang meer hebt tot je apparaat voor tweestapsverificatie.',
            ],
            'disabling' => [
                'notify' => 'Tweestapsverificatie is uitgeschakeld.',
            ],
            'regenerate_codes' => [
                'notify' => 'Nieuwe herstelcodes zijn gegenereerd.',
            ],
            'confirmation' => [
                'success_notification' => 'Code geverifieerd. Tweestapsverificatie ingeschakeld.',
                'invalid_code' => 'De code die je hebt ingevoerd is ongeldig.',
            ],
        ],
        'sanctum' => [
            'title' => 'API-tokens',
            'description' => 'Beheer API-tokens voor externe toegang tot je account. LET OP: je token is eenmalig zichtbaar na aanmaken. Indien je je token vergeet, zul je deze moeten verwijderen en een nieuwe moeten aanmaken.',
            'create' => [
                'notify' => 'Token succesvol aangemaakt!',
                'message' => 'Je token is slechts één keer zichtbaar bij het aanmaken. Als je je token verliest, moet je deze verwijderen en een nieuwe aanmaken.',
                'submit' => [
                    'label' => 'Aanmaken',
                ],
            ],
            'update' => [
                'notify' => 'Token succesvol bijgewerkt!',
            ],
            'copied' => [
                'label' => 'Ik heb mijn token gekopieerd',
            ],
        ],
        'browser_sessions' => [
            'heading' => 'Browsersessies',
            'subheading' => 'Beheer je actieve sessies.',
            'label' => 'Browsersessies',
            'content' => 'Indien nodig kun je uitloggen op al je andere browsersessies op al je apparaten. Enkele van je recente sessies worden hieronder weergegeven; deze lijst is mogelijk niet volledig. Als je denkt dat je account is gecompromitteerd, wijzig dan ook je wachtwoord.',
            'device' => 'Dit apparaat',
            'last_active' => 'Laatst actief',
            'logout_other_sessions' => 'Log uit op andere browsersessies',
            'logout_heading' => 'Log uit op andere browsersessies',
            'logout_description' => 'Voer je wachtwoord in om te bevestigen dat je wilt uitloggen op je andere browsersessies op al je apparaten.',
            'logout_action' => 'Log uit op andere browsersessies',
            'incorrect_password' => 'Het ingevoerde wachtwoord is onjuist. Probeer het opnieuw.',
            'logout_success' => 'Alle andere browsersessies zijn succesvol uitgelogd.',
        ],
    ],
    'clipboard' => [
        'link' => 'Kopieer naar klembord',
        'tooltip' => 'Gekopieerd!',
    ],
    'fields' => [
        'avatar' => 'Profielfoto',
        'email' => 'E-mailadres',
        'login' => 'Verifiëren',
        'name' => 'Naam',
        'password' => 'Wachtwoord',
        'password_confirm' => 'Wachtwoord bevestigen',
        'new_password' => 'Nieuw wachtwoord',
        'new_password_confirmation' => 'Nieuw wachtwoord bevestigen',
        'token_name' => 'Tokennaam',
        'token_expiry' => 'Tokenverloop',
        'abilities' => 'Mogelijkheden',
        '2fa_code' => 'Code',
        '2fa_recovery_code' => 'Herstelcode',
        'created' => 'Aangemaakt',
        'expires' => 'Verloopt',
    ],
    'permissions' => [
        'create' => 'Aanmaken',
        'view' => 'Bekijken',
        'update' => 'Bijwerken',
        'delete' => 'Verwijderen',
    ],
    'or' => 'Of',
    'cancel' => 'Annuleren',
];
