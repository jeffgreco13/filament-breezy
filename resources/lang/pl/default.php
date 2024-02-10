<?php

return [
    'login' => [
        'username_or_email' => 'Nazwa użytkownik lub email',
        'forgot_password_link' => 'Nie pamiętasz hasła?',
        'create_an_account' => 'załóż konto',
    ],
    'password_confirm' => [
        'heading' => 'Potwierdź hasło',
        'description' => 'Proszę potwierdzić swoje hasło, aby ukończyć tę akcję.',
        'current_password' => 'Aktualne hasło',
    ],
    'two_factor' => [
        'heading' => 'Dwuetapowa weryfikacja',
        'description' => 'Proszę potwierdzić dostęp do swojego konta, wpisując kod uwierzytelniający dostarczony przez aplikację uwierzytelniającą.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Dwuetapowa weryfikacja',
            'description' => 'Proszę potwierdzić dostęp do swojego konta, wpisując jeden z kodów awaryjnych.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Utracono urządzenie?',
        'recovery_code_link' => 'Użyj kodu awaryjnego',
        'back_to_login_link' => 'Powrót do logowania',
    ],
    'registration' => [
        'title' => 'Rejestracja',
        'heading' => 'Utwórz nowe konto',
        'submit' => [
            'label' => 'Zarejestruj się',
        ],
        'notification_unique' => 'Konto z tym adresem email już istnieje. Proszę się zalogować.',
    ],
    'reset_password' => [
        'title' => 'Nie pamietasz hasła?',
        'heading' => 'Resetuj hasło',
        'submit' => [
            'label' => 'Odzyskaj hasło',
        ],
        'notification_error' => 'Wystąpił błąd podczas resetowania hasła. Spróbuj ponownie.',
        'notification_error_link_text' => 'Spróbuj ponownie',
        'notification_success' => 'Sprawdź swoją skrzynkę pocztową, aby uzyskać instrukcje dotyczące resetowania hasła.',
    ],
    'verification' => [
        'title' => 'Zweryfikuj adres email',
        'heading' => 'Weryfikacja adresu email wymagana',
        'submit' => [
            'label' => 'Wyloguj się',
        ],
        'notification_success' => 'Sprawdź swoją skrzynkę pocztową, aby uzyskać instrukcje dotyczące weryfikacji adresu email.',
        'notification_resend' => 'Nowy link weryfikacyjny został wysłany na Twój adres email.',
        'before_proceeding' => 'Zanim przejdziesz dalej, sprawdź swoją skrzynkę pocztową, aby uzyskać link weryfikacyjny.',
        'not_receive' => 'Jeśli nie otrzymałeś wiadomości email',
        'request_another' => 'kliknij tutaj, aby poprosić o kolejny',
    ],
    'profile' => [
        'account' => 'Konto',
        'profile' => 'Profil',
        'my_profile' => 'Mój profil',
        'personal_info' => [
            'heading' => 'Twoje dane osobowe.',
            'subheading' => 'Edytuj swoje dane osobowe.',
            'submit' => [
                'label' => 'Zapisz',
            ],
            'notify' => 'Dane osobowe zaktualizowane pomyślnie!',
        ],
        'password' => [
            'heading' => 'Twoje hasło.',
            'subheading' => 'Hasło powinno składać się przynajmniej 8 znaków.',
            'submit' => [
                'label' => 'Zapisz',
            ],
            'notify' => 'Hasło zostało zaktualizowane pomyślnie!',
        ],
        '2fa' => [
            'title' => 'Weryfikacja dwuetapowa',
            'description' => 'Zarządzaj weryfikacją dwuetapową swojego konta. (rekomendowane)',
            'actions' => [
                'enable' => 'Włącz',
                'regenerate_codes' => 'Wygeneruj nowe kody',
                'disable' => 'Wyłącz',
                'confirm_finish' => 'Potwierdź i zapisz',
                'cancel_setup' => 'Anuluj',
            ],
            'setup_key' => 'Klucz konfiguracji',
            'not_enabled' => [
                'title' => 'Weryfikacja dwuetapowa nie jest włączona.',
                'description' => 'Weryfikacja dwuetapowa dodaje dodatkową warstwę bezpieczeństwa do Twojego konta. Po włączeniu tej funkcji, podczas logowania będziesz musiał podać kod weryfikacyjny, który jest generowany przez aplikację na Twoim urządzeniu.',
            ],
            'finish_enabling' => [
                'title' => 'Potwierdź weryfikację dwuetapową',
                'description' => 'Aby zakończyć włączanie weryfikacji dwuetapowej, musisz zeskanować poniższy kod QR za pomocą aplikacji uwierzytelniającej na swoim urządzeniu. Jeśli nie możesz zeskanować kodu QR, możesz wprowadzić klucz konfiguracji ręcznie.',
            ],
            'enabled' => [
                'title' => 'Weryfikacja dwuetapowa jest włączona',
                'description' => 'Weryfikacja dwuetapowa dodaje dodatkową warstwę bezpieczeństwa do Twojego konta.',
                'store_codes' => 'Zapisz te kody w bezpiecznym miejscu. Możesz je użyć, aby uzyskać dostęp do konta, jeśli utracisz dostęp do urządzenia uwierzytelniającego.',
                'show_codes' => 'Pokaż kody odzyskiwania',
                'hide_codes' => 'Ukryj kody odzyskiwania',
            ],
            'confirmation' => [
                'success_notification' => 'Kod zweryfikowany pomyślnie! Weryfikacja dwuetapowa została włączona.',
                'invalid_code' => 'Wprowadzony kod jest nieprawidłowy.',
            ],
        ],
        'sanctum' => [
            'title' => 'Tokeny API',
            'description' => 'Zarządzaj tokenami API, które pozwalają aplikacjom na dostęp do Twojego konta innym aplikacjom. (Jeżeli stracisz swój token, musisz najpierw go usunąć aby wygenerować nowy.)',
            'create' => [
                'notify' => 'Token stworzony pomyślnie!',
                'submit' => [
                    'label' => 'Stwórz token',
                ],
            ],
            'update' => [
                'notify' => 'Token zaktualizowany pomyślnie!',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Skopiuj do schowka',
        'tooltip' => 'Skopiowano!',
    ],
    'fields' => [
        'email' => 'Email',
        'login' => 'Login',
        'name' => 'Nazwa użytkownika',
        'password' => 'Hasło',
        'password_confirm' => 'Potwierdź hasło',
        'new_password' => 'Nowe hasło',
        'new_password_confirmation' => 'Potwierdź nowe hasło',
        'token_name' => 'Nazwa tokenu',
        'abilities' => 'Możliwości',
        '2fa_code' => 'Kod weryfikacji dwuetapowej',
        '2fa_recovery_code' => 'Kod odzyskiwania weryfikacji dwuetapowej',
        'created' => 'Utworzono',
        'expires' => 'Wygasa',
    ],
    'or' => 'Lub',
    'cancel' => 'Anuluj',
];
