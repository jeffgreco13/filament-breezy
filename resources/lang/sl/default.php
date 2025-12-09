<?php

return [
    'password_confirm' => [
        'heading' => 'Potrditev gesla',
        'description' => 'Za dokončanje tega dejanja potrdite svoje geslo.',
        'current_password' => 'Trenutno geslo',
    ],
    'two_factor' => [
        'heading' => 'Dvostopenjsko preverjanje',
        'description' => 'Prosimo, potrdite dostop do svojega računa z vnosom kode, ki jo je prejela vaša aplikacija za preverjanje pristnosti.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Dvofaktorska preverba',
            'description' => 'Potrdite dostop do svojega računa z vnosom ene izmed za obnovitvenih kod.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Izgubljena naprava?',
        'recovery_code_link' => 'Uporabite obnovitveno kodo',
        'back_to_login_link' => 'Nazaj na prijavo',
    ],
    'profile' => [
        'account' => 'Račun',
        'profile' => 'Profil',
        'my_profile' => 'Moj profil',
        'subheading' => 'Tukaj upravljajte svoj uporabniški profil.',
        'personal_info' => [
            'heading' => 'Osebni podatki',
            'subheading' => 'Upravljajte svoje osebne podatke.',
            'submit' => [
                'label' => 'Posodobi',
            ],
            'notify' => 'Profil je bil uspešno posodobljen!',
        ],
        'password' => [
            'heading' => 'Geslo',
            'subheading' => 'Geslo mora biti dolgo najmanj 8 znakov.',
            'submit' => [
                'label' => 'Posodobi',
            ],
            'notify' => 'Geslo je bilo uspešno posodobljeno!',
        ],
        '2fa' => [
            'title' => 'Dvostopenjska avtentikacija',
            'description' => 'Upravljajte dvostopenjsko preverjanje za svoj račun (priporočeno).',
            'actions' => [
                'enable' => 'Omogoči',
                'regenerate_codes' => 'Ustvari nove obnovitvene kode',
                'disable' => 'Onemogoči',
                'confirm_finish' => 'Potrdi in dokončaj',
                'cancel_setup' => 'Prekliči nastavitev',
                'confirm' => 'Potrdi',
            ],
            'setup_key' => 'Nastavitveni ključ',
            'must_enable' => 'Za uporabo te aplikacije morate omogočiti dvostopenjsko avtentikacijo.',
            'not_enabled' => [
                'title' => 'Niste omogočili dvostopenjske avtentikacije.',
                'description' => 'Ko je omogočeno dvofaktorsko preverjanje pristnosti, boste med preverjanjem pristnosti pozvani k vnosu varnega, naključnega žetona. Ta žeton lahko pridobite v aplikaciji Google Authenticator na telefonu.',
            ],
            'finish_enabling' => [
                'title' => 'Dokončajte nastavitev dvostopenjske avtentikacije.',
                'description' => 'Če želite dokončati nastavitev dvostopenjske avtentikacije, skenirajte naslednjo kodo QR z aplikacijo za preverjanje pristnosti v telefonu ali vnesite nastavitveni ključ in vnesite ustvarjeno kodo OTP.',
            ],
            'enabled' => [
                'notify' => 'Dvostopenjska avtentikacija omogočena.',
                'title' => 'Omogočili ste dvostopenjsko avtentikacijo!',
                'description' => 'Dvostopenjska avtentikacija je zdaj omogočena. S tem je vaš račun bolj varen.',
                'store_codes' => 'Te kode lahko uporabite za obnovitev dostopa do vašega računa, če izgubite napravo. Opozorilo! Te kode bodo prikazane samo enkrat.',
            ],
            'disabling' => [
                'notify' => 'Dvostopenjska avtentikacija je bila onemogočena.',
            ],
            'regenerate_codes' => [
                'notify' => 'Ustvarjene so bile nove kode za obnovitev.',
            ],
            'confirmation' => [
                'success_notification' => 'Koda preverjena. Dvostopenjska avtentikacija omogočena.',
                'invalid_code' => 'Kodo, ki ste jo vnesli, ni veljavna.',
            ],
        ],
        'sanctum' => [
            'title' => 'API žetoni',
            'description' => 'Upravljajte žetone API, ki omogočajo storitvam tretjih oseb dostop do te aplikacije v vašem imenu.',
            'create' => [
                'notify' => 'Žeton uspešno ustvarjen!',
                'message' => 'Vaš žeton bo prikazan samo enkrat. Če izgubite žeton, ga boste morali izbrisati in ustvariti novega.',
                'submit' => [
                    'label' => 'Ustvari',
                ],
            ],
            'update' => [
                'notify' => 'Žeton uspešno posodobljen!',
            ],
            'copied' => [
                'label' => 'Kopiral/a sem svoj žeton',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Kopiraj v odložišče',
        'tooltip' => 'Kopirano!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'E-pošta',
        'login' => 'Prijava',
        'name' => 'Ime',
        'password' => 'Geslo',
        'password_confirm' => 'Potrditev gesla',
        'new_password' => 'Novo geslo',
        'new_password_confirmation' => 'Potrditev novega gesla',
        'token_name' => 'Ime žetona',
        'token_expiry' => 'Veljavnost žetona',
        'abilities' => 'Sposobnosti',
        '2fa_code' => 'Koda',
        '2fa_recovery_code' => 'Koda za obnovitev',
        'created' => 'Ustvarjeno',
        'expires' => 'Poteče',
    ],
    'permissions' => [
        'create' => 'Ustvari',
        'view' => 'Prikaži',
        'update' => 'Posodobi',
        'delete' => 'Izbriši',
    ],
    'or' => 'Ali',
    'cancel' => 'Prekliči',
];
