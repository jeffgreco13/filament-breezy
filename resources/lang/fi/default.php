<?php

return [
    'login' => [
        'username_or_email' => 'Käyttäjätunnus tai sähköposti',
        'forgot_password_link' => 'Unohditko salasanan?',
        'create_an_account' => 'Luo tili',
    ],
    'password_confirm' => [
        'heading' => 'Vahvista salasana',
        'description' => 'Vahvista salasanasi jatkaaksesi.',
        'current_password' => 'Nykyinen salasana',
    ],
    'two_factor' => [
        'heading' => 'Kaksivaiheinen tunnistautuminen',
        'description' => 'Vahvista pääsy tiliisi antamalla sovelluksen luoma varmennuskoodi.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Kaksivaiheinen tunnistautuminen',
            'description' => 'Vahvista pääsy tilillesi antamalla palautuskoodi.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Kadonnut laite?',
        'recovery_code_link' => 'Käytä palautuskoodi',
        'back_to_login_link' => 'Takaisin kirjautumiseen',
    ],
    'registration' => [
        'title' => 'Rekisteröi',
        'heading' => 'Luo tili',
        'submit' => [
            'label' => 'Kirjaudu',
        ],
        'notification_unique' => 'Tili tällä sähköpostilla on jo olemassa. Kirjaudu sisään.',
    ],
    'reset_password' => [
        'title' => 'Salasana unohdettu',
        'heading' => 'Palauta salasanasi',
        'submit' => [
            'label' => 'Lähetä',
        ],
        'notification_error' => 'Virhe: Yritä uudelleen myöhemmin. Pyydä uusi palautuslinkki.',
        'notification_error_link_text' => 'Yritä uudestaan',
        'notification_success' => 'Tarkista sähköpostisi ohjeita varten!',
    ],
    'verification' => [
        'title' => 'Vahvista sähköposti',
        'heading' => 'Sähköpostin vahvistus vaaditaan',
        'submit' => [
            'label' => 'Kirjaudu ulos',
        ],
        'notification_success' => 'Tarkista sähköpostisi ohjeita varten!',
        'notification_resend' => 'Sähköpostin vahvistus on lähetetty uudestaan',
        'before_proceeding' => 'Ennen kuin voit jatkaa, tarkista vahvistuslinkki sähköpostistasi.',
        'not_receive' => 'Jos et saanut sähköpostia,',
        'request_another' => 'paina tästä lähettääksesi uuden',
    ],
    'profile' => [
        'account' => 'Tili',
        'profile' => 'Profiili',
        'my_profile' => 'Profiilini',
        'personal_info' => [
            'heading' => 'Henkilökohtaiset tiedot',
            'subheading' => 'Muokkaa omia tietojasi.',
            'submit' => [
                'label' => 'Päivitä',
            ],
            'notify' => 'Profiili päivitetty!',
        ],
        'password' => [
            'heading' => 'Salasana',
            'subheading' => 'Pitää olla vähintään 8 merkkiä.',
            'submit' => [
                'label' => 'Päivitä',
            ],
            'notify' => 'Salasana vaihdettu!',
        ],
        '2fa' => [
            'title' => 'Kaksivaiheinen tunnistautuminen',
            'description' => 'Hallinnoi tilisi kaksivaiheista tunnistautumista (suositeltavaa).',
            'actions' => [
                'enable' => 'Ota käyttöön',
                'regenerate_codes' => 'Luo koodit uudestaan',
                'disable' => 'Ota pois käytöstä',
                'confirm_finish' => 'Vahvista & Lopeta',
                'cancel_setup' => 'Peruuta asetus',
            ],
            'setup_key' => 'Avaimen asetus',
            'not_enabled' => [
                'title' => 'Et ole ottanut kaksivaiheista tunnistautumista käyttöön.',
                'description' => 'Kun kaksivaiheinen tunnistautuminen on käytössä, sinulta kysytään satunnainen koodi varmistamista varten. Voit hankkia sen puhelimesi todentamissovelluksella.',
            ],
            'finish_enabling' => [
                'title' => 'Viimeistele kaksivaiheisen tunnistaumisen käyttöönotto.',
                'description' => 'Kaksivaiheise tunnistautumisen viimeistelemistä, skannaa QR-koodi puhelimesi todentamissovelluksella tai lisää annettu avain ja syötä luotu kertakäyttökoodi.',
            ],
            'enabled' => [
                'title' => 'Olet ottanut kaksivaiheisen tunnistautumisen käyttöön!',
                'description' => 'Kaksivaiheinen tunnistautuminen on päällä. Tämän avulla tilisi on turvallisempi.',
                'store_codes' => 'Pidä palautuskoodit turvallisessa sijainnissa. Näitä koodeja käytetään jos kaksivaiheisen tunnistautumisen laite ei ole saatavilla.',
                'show_codes' => 'Näytä palautuskoodit',
                'hide_codes' => 'Piilota palautuskoodit',
            ],
            'confirmation' => [
                'success_notification' => 'Koodi vahvistettu, kaksivaiheinen tunnistauminen on käytössä.',
                'invalid_code' => 'Antamasi koodi on viallinen.',
            ],
        ],
        'sanctum' => [
            'title' => 'API valtuutus',
            'description' => 'Hallinnoi API valtuutuuksia joiden avulla kolmannen osapuolen palvelut voivat ottaa yhteyden tähän palveluun puolestasi. HUOM: valtuutus näytetään luomisen yhteydessä. Jos menetät valtuutuksen, poista vanha ja luo uusi.',
            'create' => [
                'notify' => 'Valtuutus luotu!',
                'submit' => [
                    'label' => 'Luo',
                ],
            ],
            'update' => [
                'notify' => 'Valtuutus päivitetty!',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Kopioi leikepöydälle',
        'tooltip' => 'Kopioitu!',
    ],
    'fields' => [
        'email' => 'Sähköposti',
        'login' => 'Kirjaudu',
        'name' => 'Nimi',
        'password' => 'Salasana',
        'password_confirm' => 'Vahvista salasana',
        'new_password' => 'Uusi salasana',
        'new_password_confirmation' => 'Vahvista uusi salasana',
        'token_name' => 'Valtuutuksen nimi',
        'abilities' => 'Kyvyt',
        '2fa_code' => 'Koodi',
        '2fa_recovery_code' => 'Palautuskoodi',
        'created' => 'Luotu',
        'expires' => 'Vanhenee',
    ],
    'or' => 'Tai',
    'cancel' => 'Peruuta',
];
