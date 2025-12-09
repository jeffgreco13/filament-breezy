<?php

return [
    'login' => [
        'username_or_email' => 'Benutzername oder E-Mail',
        'forgot_password_link' => 'Haben Sie Ihr Passwort vergessen?',
        'create_an_account' => 'Konto erstellen',
    ],
    'password_confirm' => [
        'heading' => 'Passwort bestätigen',
        'description' => 'Bestätigen Sie bitte Ihr Passwort, um diese Aktion abzuschließen.',
        'current_password' => 'Aktuelles Passwort',
    ],
    'two_factor' => [
        'heading' => 'Zwei-Faktor-Authentifizierung',
        'description' => 'Bitte bestätigen Sie den Zugriff auf Ihr Konto, indem Sie den von Ihrer Authentifizierungs-App bereitgestellten Authentifizierungscode eingeben.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Zwei-Faktor-Authentifizierung',
            'description' => 'Bitte bestätigen Sie den Zugang zu Ihrem Konto, indem Sie einen Ihrer Notfallcodes eingeben.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Haben Sie Ihr Gerät verloren?',
        'recovery_code_link' => 'Verwenden Sie einen Wiederherstellungscode',
        'back_to_login_link' => 'Zurück zum Einloggen',
    ],
    'registration' => [
        'title' => 'Registrieren',
        'heading' => 'Ein neues Konto erstellen',
        'submit' => [
            'label' => 'Registrieren',
        ],
        'notification_unique' => 'Es existiert bereits ein Konto mit dieser E-Mail-Adresse. Bitte melden Sie sich an.',
    ],
    'reset_password' => [
        'title' => 'Passwort vergessen',
        'heading' => 'Setzen Sie Ihr Passwort zurück',
        'submit' => [
            'label' => 'Zurücksetzen',
        ],
        'notification_error' => 'Fehler beim Zurücksetzen des Passworts. Bitte fordern Sie ein neues Passwort an.',
        'notification_error_link_text' => 'Erneut versuchen',
        'notification_success' => 'Prüfen Sie Ihren E-Mail auf Anweisungen!',
    ],
    'verification' => [
        'title' => 'E-Mail verifizieren',
        'heading' => 'E-Mail-Verifizierung erforderlich',
        'submit' => [
            'label' => 'Abmelden',
        ],
        'notification_success' => 'Prüfen Sie Ihren Posteingang auf Anweisungen!',
        'notification_resend' => 'Die Verifizierungs-E-Mail wurde erneut gesendet.',
        'before_proceeding' => 'Bevor Sie fortfahren, überprüfen Sie bitte Ihre E-Mail auf einen Verifizierungslink.',
        'not_receive' => 'Wenn Sie die E-Mail nicht erhalten haben,',
        'request_another' => 'Klicken Sie hier, um eine weitere E-Mail anzufordern',
    ],
    'profile' => [
        'account' => 'Konto',
        'profile' => 'Profil',
        'my_profile' => 'Mein Profil',
        'subheading' => 'Verwalten Sie hier ihr Profil.',
        'personal_info' => [
            'heading' => 'Persönliche Informationen',
            'subheading' => 'Verwalten Sie Ihre persönlichen Daten.',
            'submit' => [
                'label' => 'Aktualisieren',
            ],
            'notify' => 'Profil erfolgreich aktualisiert!',
        ],
        'password' => [
            'heading' => 'Passwort',
            'subheading' => 'Muss 8 Zeichen lang sein',
            'submit' => [
                'label' => 'Aktualisieren',
            ],
            'notify' => 'Passwort erfolgreich aktualisiert!',
        ],
        '2fa' => [
            'title' => 'Zwei-Faktor-Authentifizierung',
            'description' => 'Verwalten Sie die 2-Faktor-Authentifizierung für Ihr Konto (empfohlen).',
            'actions' => [
                'enable' => 'Aktivieren',
                'regenerate_codes' => 'Codes neu generieren',
                'disable' => 'Deaktivieren',
                'confirm_finish' => 'Bestätigen & beenden',
                'cancel_setup' => 'Einstellung abbrechen',
                'confirm' => 'Bestätigen',
            ],
            'setup_key' => 'Einstellungsschlüssel',
            'must_enable' => 'Sie müssen die Zwei-Faktor-Authentifizierung aktivieren, um diese Anwendung zu verwenden.',
            'not_enabled' => [
                'title' => 'Sie haben die Zwei-Faktor-Authentifizierung nicht aktiviert.',
                'description' => 'Wenn die Zwei-Faktor-Authentifizierung aktiviert ist, werden Sie während der Authentifizierung zur Eingabe eines sicheren, zufälligen Tokens aufgefordert. Sie können dieses Token über die Google Authenticator-App auf Ihrem Handy abrufen.',
            ],
            'finish_enabling' => [
                'title' => 'Beenden Sie die Aktivierung der Zwei-Faktor-Authentifizierung.',
                'description' => 'Um die Aktivierung der Zwei-Faktor-Authentifizierung abzuschließen, scannen Sie den folgenden QR-Code mit der Authenticator-Applikation Ihres Handys oder geben Sie den Installationsschlüssel und den generierten OTP-Code ein.',
            ],
            'enabled' => [
                'title' => 'Sie haben die Zwei-Faktor-Authentifizierung aktiviert!',
                'notify' => 'Zwei-Faktor-Authentifizierung wurde aktiviert.',
                'description' => 'Die Zwei-Faktor-Authentifizierung ist jetzt aktiviert. Dadurch wird Ihr Konto noch sicherer.',
                'store_codes' => 'Speichern Sie diese Wiederherstellungscodes in einem sicheren Passwort-Manager. Sie können verwendet werden, um den Zugang zu Ihrem Konto wiederherzustellen, wenn Ihr Zwei-Faktor-Authentifizierungsgerät verloren geht.',
                'show_codes' => 'Wiederherstellungscodes anzeigen',
                'hide_codes' => 'Wiederherstellungscodes ausblenden',
            ],
            'disabling' => [
                'notify' => 'Zwei-Faktor-Authentifizierung wurde deaktiviert.',
            ],
            'regenerate_codes' => [
                'notify' => 'Neue Wiederherstellungscodes wurden generiert.',
            ],
            'confirmation' => [
                'success_notification' => 'Code verifiziert. Zwei-Faktor-Authentifizierung aktiviert.',
                'invalid_code' => 'Der von Ihnen eingegebene Code ist ungültig.',
            ],
        ],
        'sanctum' => [
            'title' => 'API Tokens',
            'description' => 'Verwalten Sie API-Tokens, mit denen Dienste von Drittanbietern in Ihrem Namen auf diese Anwendung zugreifen können. HINWEIS: Ihr Token wird bei der Erstellung einmalig angezeigt. Wenn Sie Ihr Token verlieren, müssen Sie es löschen und ein neues erstellen.',
            'create' => [
                'message' => 'Dein Token wird nur einmal bei der Erstellung angezeigt. Wenn du dein Token verlierst, musst du es löschen und ein neues erstellen.',
                'notify' => 'Token erfolgreich erstellt!',
                'submit' => [
                    'label' => 'Erstellen',
                ],
            ],
            'update' => [
                'notify' => 'Token erfolgreich aktualisiert!',
            ],
            'copied' => [
                'label' => 'Ich habe mein Token kopiert',
            ],
        ],
        'browser_sessions' => [
            'heading' => 'Browser Sessions',
            'subheading' => 'Verwalten Sie Ihre aktiven Sitzungen.',
            'label' => 'Browser Sessions',
            'content' => 'Falls erforderlich, können Sie sich von allen anderen Browser-Sitzungen auf allen Ihren Geräten abmelden. Einige Ihrer letzten Sitzungen sind unten aufgeführt; diese Liste ist jedoch möglicherweise nicht vollständig. Wenn Sie glauben, dass Ihr Konto kompromittiert wurde, sollten Sie auch Ihr Passwort aktualisieren.',
            'device' => 'Dieses Gerät',
            'last_active' => 'Zuletzt aktiv',
            'logout_other_sessions' => 'Andere Browser-Sitzungen abmelden',
            'logout_heading' => 'Andere Browser-Sitzungen abmelden',
            'logout_description' => 'Bitte geben Sie Ihr Passwort ein, um zu bestätigen, dass Sie sich von Ihren anderen Browser-Sitzungen auf allen Ihren Geräten abmelden möchten.',
            'logout_action' => 'Andere Browser-Sitzungen abmelden',
            'incorrect_password' => 'Das von Ihnen eingegebene Passwort war falsch. Bitte versuchen Sie es erneut.',
            'logout_success' => 'Alle anderen Browser-Sitzungen wurden erfolgreich abgemeldet.',
        ],
    ],
    'clipboard' => [
        'link' => 'In die Zwischenablage kopieren',
        'tooltip' => 'Kopiert!',
    ],
    'fields' => [
        'avatar' => 'Profilbild',
        'email' => 'E-Mail',
        'login' => 'Einloggen',
        'name' => 'Benutzername',
        'password' => 'Passwort',
        'password_confirm' => 'Passwort bestätigen',
        'new_password' => 'Neues Passwort',
        'new_password_confirmation' => 'Bestätigen Sie das Passwort',
        'token_name' => 'Token-Name',
        'token_expiry' => 'Ablaufdatum',
        'abilities' => 'Möglichkeiten',
        '2fa_code' => 'Code',
        '2fa_recovery_code' => 'Wiederherstellungscode',
        'created' => 'Erstellt',
        'expired' => 'Abgelaufen',
        'expires' => 'Läuft ab',
    ],
    'permissions' => [
        'create' => 'Erstellen',
        'view' => 'Anzeigen',
        'update' => 'Aktualisieren',
        'delete' => 'Löschen',
    ],
    'or' => 'Oder',
    'cancel' => 'Abbrechen',
];
