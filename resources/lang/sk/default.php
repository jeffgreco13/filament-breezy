<?php

return [
    'password_confirm' => [
        'heading' => 'Potvrdiť heslo',
        'description' => 'Pre dokončenie vyplňte potvrdiť heslo.',
        'current_password' => 'Aktuálne heslo',
    ],
    'two_factor' => [
        'heading' => 'Dvojfaktorové overenie',
        'description' => 'Prosím potvrďte prístup k vášmu účtu zadaním kódu z vašej autentifikačnej aplikácie.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Dvojfaktorové overenie',
            'description' => 'Prosím potvrďte prístup k vášmu účtu zadaním jedného z vašich záložných kódov.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Stratené zariadenie?',
        'recovery_code_link' => 'Použiť záložný kód',
        'back_to_login_link' => 'Späť na prihlásenie',
    ],
    'profile' => [
        'account' => 'Účet',
        'profile' => 'Profil',
        'my_profile' => 'Môj profil',
        'subheading' => 'Tu môžete spravovať svoj profil.',
        'personal_info' => [
            'heading' => 'Osobné informácie',
            'subheading' => 'Správa osobných informácií',
            'submit' => [
                'label' => 'Aktualizovať',
            ],
            'notify' => 'Profil úspešne aktualizovaný!',
        ],
        'password' => [
            'heading' => 'Heslo',
            'subheading' => 'Musí byť najmenej 8 znakov dlhé.',
            'submit' => [
                'label' => 'Aktualizovať',
            ],
            'notify' => 'Heslo úspešne aktualizované!',
        ],
        '2fa' => [
            'title' => 'Dvojfaktorové overenie',
            'description' => 'Zvýšte bezpečnosť svojho účtu pomocou dvojfaktorového overenia (odporúčané).',
            'actions' => [
                'enable' => 'Povoliť',
                'regenerate_codes' => 'Obnoviť záložné kódy',
                'disable' => 'Zakázať',
                'confirm_finish' => 'Potvrdiť a dokončiť',
                'cancel_setup' => 'Zrušiť nastavenie',
                'confirm' => 'Potvrdiť',
            ],
            'setup_key' => 'Nastavenie kľúča',
            'must_enable' => 'V tejto aplikácii je vyžadované dvojfaktorové overenie.',
            'not_enabled' => [
                'title' => 'Nemáte povolené dvojfaktorové overenie.',
                'description' => 'Keď je povolené dvojfaktorové overenie, budete pri prihlásení vyzvaní k zadaniu bezpečného náhodného tokenu. Tento token môžete získať z autentifikačnej aplikácie vášho telefónu.',
            ],
            'finish_enabling' => [
                'title' => 'Dokončite povolenie dvojfaktorového overenia',
                'description' => 'Na dokončenie povolenia dvojfaktorového overenia naskenujte nasledujúci QR kód pomocou autentifikačnej aplikácie vášho telefónu alebo zadajte nastavenie kľúča a zadajte vygenerovaný kód OTP.',
            ],
            'enabled' => [
                'notify' => 'Dvojfaktorové overenie povolené.',
                'title' => 'Úspešne ste povolili dvojfaktorové overenie!',
                'description' => 'Dvojfaktorové overenie bolo úspešne povolené. Váš účet je teraz bezpečnejší.',
                'store_codes' => 'Tieto kódy môžu byť použité na obnovenie prístupu k vášmu účtu, ak stratíte zariadenie. Varovanie! Tieto kódy sa zobrazia iba raz.',
            ],
            'disabling' => [
                'notify' => 'Dvojfaktorové overenie zakázané.',
            ],
            'regenerate_codes' => [
                'notify' => 'Nové záložné kódy boli vygenerované.',
            ],
            'confirmation' => [
                'success_notification' => 'Kód potvrdený, dvojfaktorové overenie povolené.',
                'invalid_code' => 'Zadaný kód je neplatný.',
            ],
        ],
        'sanctum' => [
            'title' => 'API tokeny',
            'description' => 'Spravujte API tokeny, ktoré umožňujú tretím stranám prístup k tejto aplikácii.',
            'create' => [
                'notify' => 'Token úspešne vytvorený!',
                'message' => 'Váš token sa zobrazí iba raz. Ak token stratíte, budete ho musieť odstrániť a vytvoriť nový.',
                'submit' => [
                    'label' => 'Vytvoriť',
                ],
            ],
            'update' => [
                'notify' => 'Token úspešne aktualizovaný!',
            ],
            'copied' => [
                'label' => 'Token mám skopírovaný',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Kopírovať do schránky',
        'tooltip' => 'Skopírované!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => 'Prihlásenie',
        'name' => 'Meno',
        'password' => 'Heslo',
        'password_confirm' => 'Potvrdenie hesla',
        'new_password' => 'Nové heslo',
        'new_password_confirmation' => 'Potvrďte heslo',
        'token_name' => 'Názov tokenu',
        'token_expiry' => 'Platnosť tokenu',
        'abilities' => 'Vlastnosti',
        '2fa_code' => 'Kód',
        '2fa_recovery_code' => 'Záložný kód',
        'created' => 'Vytvorené',
        'expires' => 'Expirácia',
    ],
    'or' => 'alebo',
    'cancel' => 'Zrušiť',
];
