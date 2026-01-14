<?php

return [
    'password_confirm' => [
        'heading' => 'Konfirmasi Kata Sandi',
        'description' => 'Silakan konfirmasi kata sandi Anda untuk melanjutkan.',
        'current_password' => 'Kata Sandi Saat Ini',
    ],
    'two_factor' => [
        'heading' => 'Tantangan Autentikasi Dua Faktor',
        'description' => 'Silakan verifikasi akses ke akun Anda dengan memasukkan kode autentikasi yang diberikan oleh aplikasi autentikator Anda.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Tantangan Autentikasi Dua Faktor',
            'description' => 'Silakan verifikasi akses ke akun Anda dengan memasukkan salah satu kode pemulihan darurat Anda.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Perangkat hilang?',
        'recovery_code_link' => 'Gunakan kode pemulihan',
        'back_to_login_link' => 'Kembali ke halaman masuk',
    ],
    'profile' => [
        'account' => 'Akun',
        'profile' => 'Profil',
        'my_profile' => 'Profil Saya',
        'subheading' => 'Kelola profil pengguna Anda di sini.',
        'personal_info' => [
            'heading' => 'Informasi Pribadi',
            'subheading' => 'Kelola informasi pribadi Anda.',
            'submit' => [
                'label' => 'Perbarui',
            ],
            'notify' => 'Profil berhasil diperbarui.',
        ],
        'password' => [
            'heading' => 'Kata Sandi',
            'subheading' => 'Minimal 8 karakter.',
            'submit' => [
                'label' => 'Perbarui',
            ],
            'notify' => 'Kata sandi berhasil diperbarui.',
        ],
        '2fa' => [
            'title' => 'Autentikasi Dua Faktor',
            'description' => 'Aktifkan autentikasi dua faktor untuk meningkatkan keamanan akun Anda (disarankan).',
            'actions' => [
                'enable' => 'Aktifkan',
                'regenerate_codes' => 'Buat Ulang Kode Pemulihan',
                'disable' => 'Nonaktifkan',
                'confirm_finish' => 'Konfirmasi & Selesai',
                'cancel_setup' => 'Batalkan Pengaturan',
                'confirm' => 'Konfirmasi',
            ],
            'setup_key' => 'Kunci Pengaturan',
            'must_enable' => 'Anda wajib mengaktifkan autentikasi dua faktor untuk menggunakan aplikasi ini.',
            'not_enabled' => [
                'title' => 'Autentikasi dua faktor belum diaktifkan.',
                'description' => 'Jika autentikasi dua faktor aktif, Anda akan diminta memasukkan token acak yang aman saat proses autentikasi. Token dapat diperoleh melalui aplikasi Google Authenticator di ponsel Anda.',
            ],
            'finish_enabling' => [
                'title' => 'Selesaikan Pengaktifan Autentikasi Dua Faktor',
                'description' => 'Untuk menyelesaikan pengaktifan, scan QR code berikut menggunakan aplikasi autentikator di ponsel Anda atau masukkan kunci pengaturan, lalu input kode OTP yang dihasilkan.',
            ],
            'enabled' => [
                'notify' => 'Autentikasi dua faktor telah diaktifkan.',
                'title' => 'Autentikasi dua faktor aktif!',
                'description' => 'Autentikasi dua faktor telah diaktifkan. Scan QR code berikut menggunakan aplikasi autentikator di ponsel Anda atau gunakan kunci pengaturan, lalu masukkan OTP yang dihasilkan.',
                'store_codes' => 'Simpan kode pemulihan ini di tempat yang aman. Kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat autentikasi dua faktor tidak tersedia. Penting: Kode ini hanya ditampilkan satu kali.',
            ],
            'disabling' => [
                'notify' => 'Autentikasi dua faktor telah dinonaktifkan.',
            ],
            'regenerate_codes' => [
                'notify' => 'Kode pemulihan baru telah dibuat.',
            ],
            'confirmation' => [
                'success_notification' => 'Kode berhasil diverifikasi. Autentikasi dua faktor telah diaktifkan.',
                'invalid_code' => 'Kode yang Anda masukkan tidak valid.',
            ],
        ],
        'sanctum' => [
            'title' => 'Token API',
            'description' => 'Kelola token API yang memungkinkan layanan pihak ketiga mengakses aplikasi ini atas nama Anda.',
            'create' => [
                'notify' => 'Token berhasil dibuat.',
                'message' => 'Token hanya ditampilkan satu kali setelah dibuat. Jika Anda kehilangan token, Anda harus menghapus dan membuat token baru.',
                'submit' => [
                    'label' => 'Buat',
                ],
            ],
            'update' => [
                'notify' => 'Token berhasil diperbarui.',
                'submit' => [
                    'label' => 'Perbarui',
                ],
            ],
            'copied' => [
                'label' => 'Saya telah menyalin token saya',
            ],
        ],
        'browser_sessions' => [
            'heading' => 'Sesi Browser',
            'subheading' => 'Kelola sesi aktif Anda.',
            'label' => 'Sesi Browser',
            'content' => 'Jika diperlukan, Anda dapat keluar dari semua sesi browser di seluruh perangkat Anda. Beberapa sesi terbaru tercantum di bawah ini; namun, daftar ini mungkin tidak lengkap. Jika Anda menduga akun Anda telah diretas, segera perbarui kata sandi Anda.',
            'device' => 'Perangkat ini',
            'last_active' => 'Terakhir Aktif',
            'logout_other_sessions' => 'Keluar dari Sesi Browser Lain',
            'logout_heading' => 'Keluar dari Sesi Browser Lain',
            'logout_description' => 'Silakan masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin keluar dari sesi browser lain di semua perangkat.',
            'logout_action' => 'Keluar dari Sesi Browser Lain',
            'incorrect_password' => 'Kata sandi yang Anda masukkan salah. Silakan coba lagi.',
            'logout_success' => 'Berhasil keluar dari semua sesi browser lainnya.',
        ],
    ],
    'clipboard' => [
        'link' => 'Salin ke clipboard',
        'tooltip' => 'Berhasil disalin!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => 'Login',
        'name' => 'Nama',
        'password' => 'Kata Sandi',
        'password_confirm' => 'Konfirmasi Kata Sandi',
        'new_password' => 'Kata Sandi Baru',
        'new_password_confirmation' => 'Konfirmasi Kata Sandi Baru',
        'token_name' => 'Nama Token',
        'token_expiry' => 'Masa Berlaku Token',
        'abilities' => 'Hak Akses',
        '2fa_code' => 'Kode',
        '2fa_recovery_code' => 'Kode Pemulihan',
        'created' => 'Dibuat',
        'expires' => 'Kedaluwarsa',
    ],
    'permissions' => [
        'create' => 'Buat',
        'view' => 'Lihat',
        'update' => 'Perbarui',
        'delete' => 'Hapus',
    ],
    'or' => 'Atau',
    'cancel' => 'Batal',
    'login' => [
        'username_or_email' => 'Nama Pengguna atau Email',
        'forgot_password_link' => 'Lupa kata sandi?',
        'create_an_account' => 'Buat Akun',
    ],
    'registration' => [
        'title' => 'Pendaftaran',
        'heading' => 'Buat Akun Baru',
        'submit' => [
            'label' => 'Daftar',
        ],
        'notification_unique' => 'Akun dengan alamat email ini sudah terdaftar. Silakan masuk.',
    ],
    'reset_password' => [
        'title' => 'Lupa Kata Sandi?',
        'heading' => 'Atur Ulang Kata Sandi',
        'submit' => [
            'label' => 'Kirim',
        ],
        'notification_error' => 'Terjadi kesalahan. Silakan coba lagi nanti.',
        'notification_error_link_text' => 'Coba Lagi',
        'notification_success' => 'Silakan periksa email Anda untuk instruksi lebih lanjut.',
    ],
    'verification' => [
        'title' => 'Verifikasi Email',
        'heading' => 'Verifikasi Email Diperlukan',
        'submit' => [
            'label' => 'Keluar',
        ],
        'notification_success' => 'Silakan periksa email Anda untuk instruksi lebih lanjut.',
        'notification_resend' => 'Email verifikasi telah dikirim ulang.',
        'before_proceeding' => 'Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.',
        'not_receive' => 'Jika Anda tidak menerima email tersebut,',
        'request_another' => 'Klik di sini untuk meminta email baru',
    ],
];
