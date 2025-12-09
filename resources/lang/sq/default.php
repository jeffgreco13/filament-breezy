<?php

return [
    'password_confirm' => [
        'heading' => 'Konfirmo fjalëkalimin',
        'description' => 'Ju lutemi konfirmoni fjalëkalimin tuaj për të përfunduar këtë veprim.',
        'current_password' => 'Fjalëkalimi aktual',
    ],
    'two_factor' => [
        'heading' => 'Autentifikim me dy faktorë',
        'description' => 'Ju lutemi konfirmoni hyrjen në llogarinë tuaj duke futur kodin e dhënë nga aplikacioni juaj i Autentifikimit.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Autentifikim me dy faktorë',
            'description' => 'Ju lutemi, konfirmoni hyrjen në llogarinë tuaj duke futur një nga kodet emergjent per rikuperim.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Ke humbur pajisjen?',
        'recovery_code_link' => 'Përdor një kod rikuperimi',
        'back_to_login_link' => 'Kthehu te identifikimi',
    ],
    'profile' => [
        'account' => 'Llogaria',
        'profile' => 'Profili',
        'my_profile' => 'Profili im',
        'subheading' => 'Menaxhoni profilin tuaj.',
        'personal_info' => [
            'heading' => 'Të dhënat personale',
            'subheading' => 'Menaxho informacionin tënd personal.',
            'submit' => [
                'label' => 'Përditëso',
            ],
            'notify' => 'Profili u përditësua me sukses!',
        ],
        'password' => [
            'heading' => 'Fjalëkalimi',
            'subheading' => 'Duhet të jetë së paku 8 karaktere i gjatë.',
            'submit' => [
                'label' => 'Përditëso',
            ],
            'notify' => 'Fjalëkalimi u përditësua me sukses!',
        ],
        '2fa' => [
            'title' => 'Autentifikim me dy faktorë',
            'description' => 'Menaxho autentifikimin me 2 faktorë për llogarinë tënde (rekomandohet).',
            'actions' => [
                'enable' => 'Aktivizo',
                'regenerate_codes' => 'Rigjenero kodet e rikuperimit',
                'disable' => 'Çaktivizo',
                'confirm_finish' => 'Konfirmo dhe përfundo',
                'cancel_setup' => 'Anulo konfigurimin',
                'confirm' => 'Konfirmo',
            ],
            'setup_key' => 'Çelësi i konfigurimit',
            'must_enable' => 'Duhet të aktivizoni autentifikimin me dy faktorë për të përdorur këtë faqe.',
            'not_enabled' => [
                'title' => 'Nuk keni aktivizuar autentifikimin me dy faktorë.',
                'description' => "Kur aktivizohet autentifikimi me dy faktorë, do t'ju kërkohet një kod i sigurt dhe e rastësishme gjatë vërtetimit. Ju mund ta merrni këtë kod nga aplikacioni Google Authenticator në telefonin tuaj.",
            ],
            'finish_enabling' => [
                'title' => 'Përfundo aktivizimin e autentifikimit me dy faktorë.',
                'description' => 'Për të përfunduar aktivizimin e autentifikimit me dy faktorë, skanoni kodin QR të mëposhtëm duke përdorur aplikacionin e autentifikimit ne telefonin tuaj ose futni çelësin e konfigurimit dhe vendosni kodin OTP të gjeneruar.',
            ],
            'enabled' => [
                'notify' => 'Autentifikimi me dy faktorë u aktivizua.',
                'title' => 'Ju keni aktivizuar autentifikimin me dy faktorë!',
                'description' => 'Autentifikimi me dy faktorë është aktivizuar tani. Kjo ndihmon për ta bërë llogarinë tuaj më të sigurt.',
                'store_codes' => 'Këto kode mund të përdoren për të rikuperuar aksesin në llogarinë tuaj nëse pajisja juaj humbet. Paralajmërim! Këto kode do të shfaqen vetëm një herë.',
            ],
            'disabling' => [
                'notify' => 'Autentifikimi me dy faktorë është çaktivizuar.',
            ],
            'regenerate_codes' => [
                'notify' => 'Janë krijuar kode të reja rikuperimi.',
            ],
            'confirmation' => [
                'success_notification' => 'Kodi u verifikua. Autentifikimi me dy faktorë u aktivizua.',
                'invalid_code' => 'Kodi që keni futur është i pavlefshëm.',
            ],
        ],
        'sanctum' => [
            'title' => 'Kodet API',
            'description' => 'Menaxho Kodet API që lejojnë shërbimet e palëve të treta të kenë akses në këtë aplikacion në emrin tënd.',
            'create' => [
                'notify' => 'Kodi u krijua me sukses!',
                'message' => 'Kodi juaj shfaqet vetëm një herë pas krijimit. Nëse humbet Kodi juaj, do t\'ju duhet ta fshini atë dhe të krijoni një të ri.',
                'submit' => [
                    'label' => 'Krijo',
                ],
            ],
            'update' => [
                'notify' => 'Kodi u përditësua me sukses!',
            ],
            'copied' => [
                'label' => 'Kam kopjuar kodin',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Kopjo në clipboard',
        'tooltip' => 'Kopjuar!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => 'Identifikohu',
        'name' => 'Emri',
        'fjalëkalim' => 'Fjalëkalimi',
        'password_confirm' => 'Konfirmo fjalëkalimin',
        'new_password' => 'Fjalëkalim i ri',
        'new_password_confirmation' => 'Konfirmo fjalëkalimin',
        'token_name' => 'Emri i Kodit për API',
        'token_expiry' => 'Data e skadimit te kodit API',
        'abilities' => 'Aftësitë',
        '2fa_code' => 'Kodi',
        '2fa_recovery_code' => 'Kodi i rikuperimit',
        'created' => 'Krijuar',
        'expires' => 'Skadon',
    ],
    'permissions' => [
        'create' => 'Krijo',
        'view' => 'Shiko',
        'update' => 'Përditëso',
        'delete' => 'Fshi',
    ],
    'or' => 'Ose',
    'cancel' => 'Anullo',
];
