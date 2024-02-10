<?php

return [
    'login' => [
        'username_or_email' => 'Nume de utilizator sau email',
        'forgot_password_link' => 'Am uitat parola',
        'create_an_account' => 'creaţi un cont',
    ],
    'password_confirm' => [
        'heading' => 'Confirmaţi parola',
        'description' => 'Vă rugăm să vă confirmați parola pentru a finaliza această operație.',
        'current_password' => 'Parola curentă',
    ],
    'two_factor' => [
        'heading' => 'Verificare in doi pași',
        'description' => 'Vă rugăm să confirmați accesul la contul dvs. introducând codul de autentificare furnizat de aplicația dvs. de autentificare.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Verificare in doi pași',
            'description' => 'Vă rugăm să confirmați accesul la contul dvs. introducând unul dintre codurile dvs. de recuperare de urgență.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Aparatul pierdut?',
        'recovery_code_link' => 'Utilizați un cod de recuperare',
        'back_to_login_link' => 'Înapoi la autentificare',
    ],
    'registration' => [
        'title' => 'Inregistrare',
        'heading' => 'Creați un cont nou',
        'submit' => [
            'label' => 'Inregistrare',
        ],
        'notification_unique' => 'Un cont cu acest email există deja. Vă rugăm să vă conectați.',
    ],
    'reset_password' => [
        'title' => 'Aţi uitat parola?',
        'heading' => 'Resetare parola',
        'submit' => [
            'label' => 'Trimite',
        ],
        'notification_error' => 'Eroare: vă rugăm să încercați din nou mai târziu.',
        'notification_error_link_text' => 'Try Again',
        'notification_success' => 'Verificați-vă căsuța de e-mail pentru instrucțiuni!',
    ],
    'verification' => [
        'title' => 'Verificare prin email',
        'heading' => 'Este necesară verificarea e-mailului',
        'submit' => [
            'label' => 'Deconectare',
        ],
        'notification_success' => 'Verificați-vă căsuța de e-mail pentru instrucțiuni!',
        'notification_resend' => 'E-mailul de verificare a fost retrimis.',
        'before_proceeding' => 'Înainte de a continua, vă rugăm să vă verificați e-mailul pentru un link de verificare.',
        'not_receive' => 'Dacă nu ați primit e-mailul,',
        'request_another' => 'click aici pentru a solicita altul',
    ],
    'profile' => [
        'account' => 'Cont',
        'profile' => 'Profil',
        'my_profile' => 'Profilul meu',
        'personal_info' => [
            'heading' => 'Informații personale',
            'subheading' => 'Completează informațiile personale',
            'submit' => [
                'label' => 'Salvare',
            ],
            'notify' => 'Profil actualizat cu succes!',
        ],
        'password' => [
            'heading' => 'Parola',
            'subheading' => 'Trebuie să aibă cel puțin 8 caractere.',
            'submit' => [
                'label' => 'Salvare',
            ],
            'notify' => 'Parola actualizată cu succes!',
        ],
        '2fa' => [
            'title' => 'Verificare in doi pași',
            'description' => 'Folosiți autentificarea în doi factori pentru contul dvs. (recomandat).',
            'actions' => [
                'enable' => 'Activare',
                'regenerate_codes' => 'Regenerare coduri',
                'disable' => 'Dezactivare',
                'confirm_finish' => 'Confirmare și finalizare',
                'cancel_setup' => 'Anulare setare',
            ],
            'setup_key' => 'Setare cheie',
            'not_enabled' => [
                'title' => 'Nu ați activat autentificarea in doi pași.',
                'description' => 'Când autentificarea in doi pași este activată, vi se va solicita un token securizat, aleatoriu în timpul autentificării. Puteți prelua acest simbol din aplicația Google Authenticator a telefonului dvs.',
            ],
            'finish_enabling' => [
                'title' => 'Finalizați activarea autentificării in doi pași.',
                'description' => 'Pentru a finaliza activarea autentificării in doi pași, scanați următorul cod QR folosind aplicația de autentificare a telefonului sau introduceți cheia de configurare și furnizați codul OTP generat.',
            ],
            'enabled' => [
                'title' => 'Ați activat autentificarea in doi pași!',
                'description' => 'Autentificarea in doi pași este acum activată. Scanați următorul cod QR folosind aplicația de autentificare a telefonului sau introduceți cheia de configurare.',
                'store_codes' => 'Păstrați aceste coduri de recuperare într-un manager de parole securizat. Acestea pot fi folosite pentru a recupera accesul la contul dvs. dacă dispozitivul de autentificare in doi pașii este pierdut.',
                'show_codes' => 'Afișare coduri de recuperare',
                'hide_codes' => 'Ascunde codurile de recuperare',
            ],
            'confirmation' => [
                'success_notification' => 'Cod verificat. Autentificarea in doi pași este activată.',
                'invalid_code' => 'Codul pe care l-ați introdus este nevalid.',
            ],
        ],
        'sanctum' => [
            'title' => 'API Tokens',
            'description' => 'Gestionați token-urile API care permit serviciilor terțe să acceseze această aplicație în numele dvs. NOTĂ: token-ul dvs. este afișat o dată după creare. Dacă vă pierdeți token-ul, va trebui să îl ștergeți și să creați unul nou.',
            'create' => [
                'notify' => 'Token creat cu succes!',
                'submit' => [
                    'label' => 'Creare token',
                ],
            ],
            'update' => [
                'notify' => 'Tokenul a fost actualizat cu succes!',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Copiere în clipboard',
        'tooltip' => 'Copiat!',
    ],
    'fields' => [
        'email' => 'Email',
        'login' => 'Login',
        'name' => 'Nume',
        'password' => 'Parola',
        'password_confirm' => 'Confirmare parola',
        'new_password' => 'Parola nouă',
        'new_password_confirmation' => 'Confirmare parola nouă',
        'token_name' => 'Nume token',
        'abilities' => 'Abilități',
        '2fa_code' => 'Cod',
        '2fa_recovery_code' => 'Cod de recuperare',
        'created' => 'Creat',
        'expires' => 'Expiră',
    ],
    'or' => 'Sau',
    'cancel' => 'Anulare',
];
