<?php

return [
    'login' => [
        'username_or_email' => 'Felhasználónév vagy e-mail cím',
        'forgot_password_link' => 'Elfelejtett jelszó?',
        'create_an_account' => 'fiók létrehozása',
    ],
    'password_confirm' => [
        'heading' => 'Jelszó megerősítése',
        'description' => 'Kérem adja meg a jelszavát, hogy vérehajthassa ezt a műveletet.',
        'current_password' => 'Jelenlegi jelszó',
    ],
    'two_factor' => [
        'heading' => 'Kétfaktoros hitelesítés',
        'description' => 'Kérjük, erősítse meg fiókjához való hozzáférést a hitelesítő alkalmazás által biztosított hitelesítési kód megadásával.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Kétfaktoros hitelesítés visszaállítása',
            'description' => 'Kérjük, erősítse meg a fiókjához való hozzáférést a vészhelyzeti helyreállítási kódok egyikének megadásával.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Elveszett készülék?',
        'recovery_code_link' => 'Használjon helyreállítási kódot',
        'back_to_login_link' => 'Vissza a bejelentkezéshez',
    ],
    'registration' => [
        'title' => 'Regisztráció',
        'heading' => 'Fiók létrehozása',
        'submit' => [
            'label' => 'Regisztráció',
        ],
        'notification_unique' => 'Már létezik fiók ezzel az e-mail-címmel. Kérjük jelentkezzen be.',
    ],
    'reset_password' => [
        'title' => 'Elfelejtett jelszó',
        'heading' => 'Jelszó visszaállítása',
        'submit' => [
            'label' => 'Küldés',
        ],
        'notification_error' => 'Hiba: próbálja újra később.',
        'notification_error_link_text' => 'Try Again',
        'notification_success' => 'Tekintse meg beérkezett üzeneteit az utasításokért!',
    ],
    'verification' => [
        'title' => 'E-mail megerősítés',
        'heading' => 'E-mail ellenőrzés szükséges',
        'submit' => [
            'label' => 'Kijelentkezés',
        ],
        'notification_success' => 'Tekintse meg beérkezett üzeneteit az utasításokért!',
        'notification_resend' => 'Az ellenőrző e-mailt újra elküldtük.',
        'before_proceeding' => 'Mielőtt folytatná, kérjük, ellenőrizze e-mailjében az ellenőrző linket.',
        'not_receive' => 'Ha nem kapta meg az e-mailt,',
        'request_another' => 'kattintson ide egy másik kéréséhez',
    ],
    'profile' => [
        'account' => 'Fiók',
        'profile' => 'Profil',
        'my_profile' => 'Saját profil',
        'personal_info' => [
            'heading' => 'Személyes információk',
            'subheading' => 'Kérjük, adja meg a személyes adatait',
            'submit' => [
                'label' => 'Frissítés',
            ],
            'notify' => 'A profil sikeresen frissítve!',
        ],
        'password' => [
            'heading' => 'Jelszó',
            'subheading' => 'Legalább 8 karakterből kell állnia.',
            'submit' => [
                'label' => 'Frissítés',
            ],
            'notify' => 'A jelszó sikeresen frissítve!',
        ],
        '2fa' => [
            'title' => 'Kétfaktoros hitelesítés',
            'description' => 'Kétfaktoros hitelesítés kezelése fiókjához (ajánlott).',
            'actions' => [
                'enable' => 'Engedélyezés',
                'regenerate_codes' => 'Új kódok generálása',
                'disable' => 'Tiltás',
                'confirm_finish' => 'Megerősítés és befejezés',
                'cancel_setup' => 'A beállítás megszakítása',
            ],
            'setup_key' => 'Beállítási kulcs',
            'not_enabled' => [
                'title' => 'Nem engedélyezte a kéttényezős hitelesítést.',
                'description' => 'Ha a kéttényezős hitelesítés engedélyezve van, a rendszer a hitelesítés során egy biztonságos, véletlenszerű tokent kér. Ezt a tokent telefonja Google Authenticator alkalmazásából kérheti le.',
            ],
            'finish_enabling' => [
                'title' => 'Kétfaktoros hitelesítés engedélyezésének befejezése.',
                'description' => 'A kétfaktoros hitelesítés engedélyezésének befejezéséhez olvassa be a következő QR-kódot telefonja hitelesítő alkalmazásával, vagy adja meg a beállítási kulcsot, és adja meg a generált egyszeri kódot.',
            ],
            'enabled' => [
                'title' => 'Engedélyezte a kéttényezős hitelesítést!',
                'description' => 'A kétfaktoros hitelesítés most engedélyezve van. Olvassa be a következő QR-kódot telefonja hitelesítő alkalmazásával, vagy írja be a beállítási kulcsot.',
                'store_codes' => 'Tárolja ezeket a helyreállítási kódokat egy biztonságos jelszókezelőben. Ezek felhasználhatók fiókjához való hozzáférés helyreállítására, ha a kétfaktoros hitelesítési eszköz elveszne.',
                'show_codes' => 'Helyreállítási kódok megjelenítése',
                'hide_codes' => 'Helyreállítási kódok elrejtése',
            ],
            'confirmation' => [
                'success_notification' => 'A kód ellenőrizve. Kétfaktoros hitelesítés engedélyezve.',
                'invalid_code' => 'A megadott kód érvénytelen.',
            ],
        ],
        'sanctum' => [
            'title' => 'API Tokenek',
            'description' => 'Kezelje azokat az API-tokeneket, amelyek lehetővé teszik, hogy harmadik fél szolgáltatásai hozzáférjenek ehhez az alkalmazáshoz az Ön nevében. MEGJEGYZÉS: a token csak egyszer megjelenik a létrehozáskor. Ha elveszíti a tokent, törölnie kell, és újat kell létrehoznia.',
            'create' => [
                'notify' => 'Az API token létrehozva.',
                'submit' => [
                    'label' => 'Létrehozás',
                ],
            ],
            'update' => [
                'notify' => 'Az API token frissítve.',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Link másolása',
        'tooltip' => 'Másolás sikerült!',
    ],
    'fields' => [
        'email' => 'E-mail cím',
        'login' => 'Bejelentkezés',
        'name' => 'Név',
        'password' => 'Jelszó',
        'password_confirm' => 'Jelszó megerősítése',
        'new_password' => 'Új jelszó',
        'new_password_confirmation' => 'Új jelszó megerősítése',
        'token_name' => 'Token neve',
        'abilities' => 'Képességek',
        '2fa_code' => 'Kód',
        '2fa_recovery_code' => 'Helyreállítási kód',
        'created' => 'Létrehozva',
        'expires' => 'Lejár',
    ],
    'or' => 'Vagy',
    'cancel' => 'Mégsem',
];
