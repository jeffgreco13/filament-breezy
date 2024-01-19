<?php

return [
    'password_confirm' => [
        'heading' => 'Parolayı doğrula',
        'description' => 'Bu işlemi tamamlamak için lütfen şifrenizi onaylayın.',
        'current_password' => 'Mevcut parola',
    ],
    'two_factor' => [
        'heading' => 'İki Adımlı Doğrulama',
        'description' => 'Lütfen kimlik doğrulayıcı uygulamanız tarafından sağlanan kimlik doğrulama kodunu girerek hesabınıza erişimi onaylayın.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'İki Adımlı Doğrulama',
            'description' => 'Lütfen acil durum kurtarma kodlarınızdan birini girerek hesabınıza erişimi onaylayın.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Kayıp cihaz?',
        'recovery_code_link' => 'Bir kurtarma kodu kullanın',
        'back_to_login_link' => 'Girişe geri dön',
    ],
    'profile' => [
        'account' => 'Hesap',
        'profile' => 'Profil',
        'my_profile' => 'Profilim',
        'subheading' => 'Kullanıcı profilinizi buradan yönetin.',
        'personal_info' => [
            'heading' => 'Kişisel Bilgiler',
            'subheading' => 'Kişisel bilgilerinizi yönetin.',
            'submit' => [
                'label' => 'Güncelle',
            ],
            'notify' => 'Profil başarıyla güncellendi!',
        ],
        'password' => [
            'heading' => 'Şifre',
            'subheading' => '8 karakter olmalıdır.',
            'submit' => [
                'label' => 'Güncelle',
            ],
            'notify' => 'Şifre başarıyla güncellendi!',
        ],
        '2fa' => [
            'title' => 'İki Adımlı Doğrulama',
            'description' => 'Hesabınız için iki adımlı kimlik doğrulamayı yönetin (önerilir).',
            'actions' => [
                'enable' => 'Etkinleştir',
                'regenerate_codes' => 'Kodları Yeniden Oluştur',
                'disable' => 'Devredışı bırak',
                'confirm_finish' => 'Onayla & bitir',
                'cancel_setup' => 'Kurulumu iptal et',
            ],
            'setup_key' => 'Kurulum anahtarı',
            'must_enable' => 'Bu uygulamayı kullanmak için iki faktörlü kimlik doğrulamayı etkinleştirmeniz gerekir.',
            'not_enabled' => [
                'title' => 'İki adımlı kimlik doğrulamayı etkinleştirmediniz.',
                'description' => 'İki adımlı kimlik doğrulaması etkinleştirildiğinde, kimlik doğrulaması sırasında güvenli, rasgele bir belirteç istenir. Bu belirteci telefonunuzun Google Authenticator uygulamasından alabilirsiniz.',
            ],
            'finish_enabling' => [
                'title' => 'İki adımlı kimlik doğrulamayı etkinleştirmeyi bitirin.',
                'description' => 'İki adımlı kimlik doğrulamayı etkinleştirmeyi bitirmek için telefonunuzun kimlik doğrulayıcı uygulamasını kullanarak aşağıdaki QR kodunu tarayın veya kurulum anahtarını girin ve oluşturulan OTP kodunu girin.',
            ],
            'enabled' => [
                'notify' => 'İki faktörlü kimlik doğrulama etkin.',
                'title' => 'İki adımlı kimlik doğrulamayı etkinleştirdiniz!',
                'description' => 'İki adımlı kimlik doğrulama artık etkin. Telefonunuzun kimlik doğrulayıcı uygulamasını kullanarak aşağıdaki QR kodunu tarayın veya kurulum anahtarını girin.',
                'store_codes' => 'Bu kurtarma kodlarını güvenli bir parola yöneticisinde saklayın. İki adımlı kimlik doğrulama cihazınız kaybolursa hesabınıza erişimi kurtarmak için kullanılabilirler.',
            ],
            'disabling' => [
                'notify' => 'İki faktörlü kimlik doğrulama devre dışı bırakıldı.',
            ],
            'regenerate_codes' => [
                'notify' => 'Yeni kurtarma kodları oluşturuldu.',
            ],
            'confirmation' => [
                'success_notification' => 'Kod doğrulandı. İki adımlı kimlik doğrulaması etkin.',
                'invalid_code' => 'Girdiğiniz kod geçersiz.',
            ],
        ],
        'sanctum' => [
            'title' => 'API Belirteçleri',
            'description' => 'Üçüncü taraf hizmetlerinin sizin adınıza bu uygulamaya erişmesine izin veren API belirteçlerini yönetin. NOT: jetonunuz oluşturulduktan sonra bir kez gösterilir. Jetonunuzu kaybederseniz, onu silmeniz ve yeni bir tane oluşturmanız gerekir.',
            'create' => [
                'notify' => 'Belirteç başarıyla oluşturuldu!',
                'message' => 'Belirteciniz oluşturulduktan sonra yalnızca bir kez gösterilir. Belirtecinizi kaybederseniz, onu silmeniz ve yeni bir tane oluşturmanız gerekecektir.',
                'submit' => [
                    'label' => 'Oluştur',
                ],
            ],
            'update' => [
                'notify' => 'Belirteç başarıyla güncellendi!',
            ],
            'copied' => [
                'label' => 'Belirtecimi kopyaladım',
            ],
        ],
    ],
    'clipboard' => [
        'link' => 'Panoya kopyala',
        'tooltip' => 'Kopyalandı!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'E-posta',
        'login' => 'Giriş',
        'name' => 'İsim',
        'password' => 'Parola',
        'password_confirm' => 'Parola doğrulama',
        'new_password' => 'Yeni parola',
        'new_password_confirmation' => 'Parola doğrulama',
        'token_name' => 'Belirteç adı',
        'token_expiry' => 'Belirteç sona erişi',
        'abilities' => 'Yetenekler',
        '2fa_code' => 'Kod',
        '2fa_recovery_code' => 'Kurtarma Kodu',
        'created' => 'Oluşturuldu',
        'expires' => 'Sona eriyor',
    ],
    'or' => 'Veya',
    'cancel' => 'Vazgeç',
];
