<?php

return [
    'password_confirm' => [
        'heading' => 'Potvrdit heslo',
        'description' => 'Pro dokončení vyplňte potvrďte heslo.',
        'current_password' => 'Aktuální heslo',
    ],
    'two_factor' => [
        'heading' => 'Dvoufaktorové ověření',
        'description' => 'Prosím potvrďte přístup k vašemu účtu zadáním kódu z vaší autentizační aplikace.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Dvoufaktorové ověření',
            'description' => 'Prosím potvrďte přístup k vašemu účtu zadáním jednoho z vašich záložních kódů.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Ztracené zařízení?',
        'recovery_code_link' => 'Použít záložní kód',
        'back_to_login_link' => 'Zpět na přihlášení',
    ],
    'profile' => [
        'account' => 'Účet',
        'profile' => 'Profil',
        'my_profile' => 'Můj profil',
        'subheading' => 'Zde můžete spravovat svůj profil.',
        'personal_info' => [
            'heading' => 'Osobní informace',
            'subheading' => 'Správa osobních informací',
            'submit' => [
                'label' => 'Aktualizovat',
            ],
            'notify' => 'Profil aktualizován úspěšně!',
        ],
        'password' => [
            'heading' => 'Heslo',
            'subheading' => 'Musí být nejméně 8 znaků dlouhé.',
            'submit' => [
                'label' => 'Aktualizovat',
            ],
            'notify' => 'Heslo aktualizováno úspěšně!',
        ],
        '2fa' => [
            'title' => 'Dvoufaktorové ověření',
            'description' => 'Zvýšete bezpečnost svého účtu pomocí dvoufaktorového ověření (doporučeno).',
            'actions' => [
                'enable' => 'Povolit',
                'regenerate_codes' => 'Obnovit záložní kódy',
                'disable' => 'Zakázat',
                'confirm_finish' => 'Potvrdit a dokončit',
                'cancel_setup' => 'Zrušit nastavení',
            ],
            'setup_key' => 'Nastavení klíče',
            'must_enable' => 'V této aplikaci je vyžadováno dvoufaktorové ověření.',
            'not_enabled' => [
                'title' => 'Nemáte povoleno dvoufaktorové ověření.',
                'description' => 'Když je povoleno dvoufaktorové ověření, budete při přihlášení vyzváni k zadání bezpečného náhodného tokenu. Tento token můžete získat z autentizační aplikace vašeho telefonu.',
            ],
            'finish_enabling' => [
                'title' => 'Dokončete povolení dvoufaktorového ověření',
                'description' => 'K dokončení povolení dvoufaktorového ověření naskenujte následující QR kód pomocí autentizační aplikace vašeho telefonu nebo zadejte nastavení klíče a zadejte vygenerovaný kód OTP.',
            ],
            'enabled' => [
                'notify' => 'Dvoufaktorové ověření povoleno.',
                'title' => 'Úspěšně jste povolili dvoufaktorové ověření!',
                'description' => 'Dvoufaktorové ověření bylo úspěšně povoleno. Váš účet je nyní bezpečnější.',
                'store_codes' => 'Tyto kódy mohou být použity k obnovení přístupu k vašemu účtu, pokud ztratíte zařízení. Varování! Tyto kódy se zobrazí pouze jednou.',
            ],
            'disabling' => [
                'notify' => 'Dvoufaktorové ověření zakázáno.',
            ],
            'regenerate_codes' => [
                'notify' => 'Nové záložní kódy byly vygenerovány.',
            ],
            'confirmation' => [
                'success_notification' => 'Kód potvrzen, dvoufaktorové ověření povoleno.',
                'invalid_code' => 'Zadaný kód je neplatný.',
            ],
        ],
        'sanctum' => [
            'title' => 'API tokeny',
            'description' => 'Spravujte API tokeny, které umožňují třetím stranám přístup k této aplikaci.',
            'create' => [
                'notify' => 'Token vytvořen úspěšně!',
                'message' => 'Váš token se zobrazí pouze jednou. Pokud token ztratíte, budete muset jej odstranit a vytvořit nový.',
                'submit' => [
                    'label' => 'Vytvořit',
                ],
            ],
            'update' => [
                'notify' => 'Token úspěšně aktualizován!',
            ],
            'copied' => [
                'label' => 'Token mám zkopírován',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Kopírovat do schránky',
        'tooltip' => 'Zkopírováno!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => 'Přihlášení',
        'name' => 'Jméno',
        'password' => 'Heslo',
        'password_confirm' => 'Potvrzení hesla',
        'new_password' => 'Nové heslo',
        'new_password_confirmation' => 'Potvrďte heslo',
        'token_name' => 'Název tokenu',
        'token_expiry' => 'Platnost tokenu',
        'abilities' => 'Vlastnosti',
        '2fa_code' => 'Kód',
        '2fa_recovery_code' => 'Záložní kód',
        'created' => 'Vytvořeno',
        'expires' => 'Expirace',
    ],
    'or' => 'nebo',
    'cancel' => 'Zrušit',
];
