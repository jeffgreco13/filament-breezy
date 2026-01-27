<?php

return [
    'password_confirm' => [
        'heading' => 'Konfirmasi Kata Sandi',
        'description' => 'Harap konfirmasi kata sandi Anda untuk melanjutkan.',
        'current_password' => 'Kata sandi saat ini',
    ],
    'two_factor' => [
        'heading' => 'Verifikasi Dua Langkah',
        'description' => 'Harap konfirmasi akses ke akun Anda dengan memasukkan kode autentikasi yang telah diberikan oleh aplikasi autentikator Anda.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Verifikasi Dua Langkah',
            'description' => 'Harap konfirmasi akses ke akun Anda dengan memasukkan salah satu dari kode pemulihan darurat Anda.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Perangkat hilang?',
        'recovery_code_link' => 'Gunakan kode pemulihan',
        'back_to_login_link' => 'Kembali ke login',
    ],
    'profile' => [
        'account' => 'Akun',
        'profile' => 'Profil',
        'my_profile' => 'Profil saya',
        'subheading' => 'Kelola profil pengguna Anda di sini.',
        'personal_info' => [
            'heading' => 'Informasi Pribadi',
            'subheading' => 'Kelola informasi pribadi Anda.',
            'submit' => [
                'label' => 'Perbarui',
            ],
            'notify' => 'Profil berhasil diperbarui!',
        ],
        'password' => [
            'heading' => 'Kata Sandi',
            'subheading' => 'Harus 8 karakter atau lebih.',
            'submit' => [
                'label' => 'Perbarui',
            ],
            'notify' => 'Kata sandi berhasil diperbarui!',
        ],
        '2fa' => [
            'title' => 'verifikasi dua langkah',
            'description' => 'Atur 2 factor authentication untuk akun Anda (disarankan).',
            'actions' => [
                'enable' => 'Aktifkan',
                'regenerate_codes' => 'Buat ulang kode pemulihan',
                'disable' => 'Nonaktifkan',
                'confirm_finish' => 'Konfirmasi & selesai',
                'cancel_setup' => 'Batalkan pengaturan',
                'confirm' => 'Konfirmasi',
            ],
            'setup_key' => 'Kunci pengaturan',
            'must_enable' => 'Anda harus mengaktifkan verifikasi dua langkah untuk menggunakan aplikasi ini.',
            'not_enabled' => [
                'title' => 'Anda belum mengaktifkan verifikasi dua langkah.',
                'description' => 'Ketika verifikasi dua langkah aktif, Anda akan diminta token acak yang aman saat autentikasi. Anda dapat menerima token ini dari aplikasi Google Authenticator di ponsel Anda.',
            ],
            'finish_enabling' => [
                'title' => 'Selesaikan pengaktifan verifikasi dua langkah.',
                'description' => 'Untuk menyelesaikan pengaktifan verifikasi dua langkah, scan QR code berikut menggunakan aplikasi authenticator dari ponsel Anda atau masukkan kunci pengaturan dan masukkan kode OTP yang dihasilkan.',
            ],
            'enabled' => [
                'notify' => 'verifikasi dua langkah diaktifkan.',
                'title' => 'Anda telah mengaktifkan verifikasi dua langkah!',
                'description' => 'Verifikasi dua langkah sudah diaktifkan. Scan QR code berikut menggunakan aplikasi authenticator ponsel Anda atau gunakan kunci pengaturan lalu masukkan OTP yang dihasilkan.',
                'store_codes' => 'Simpan kode pemulihan ini di tempat yang aman. Kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat verifikasi dua langkah Anda tidak dapat digunakan. Penting! Kode ini hanya ditampilkan satu kali.',
            ],
            'disabling' => [
                'notify' => 'Verifikasi dua langkah telah dinonaktifkan.',
            ],
            'regenerate_codes' => [
                'notify' => 'Kode pemulihan baru telah dibuat.',
            ],
            'confirmation' => [
                'success_notification' => 'Kode terverifikasi. Verifikasi dua langkah diaktifkan.',
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
        'tooltip' => 'Disalin!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => 'Login',
        'name' => 'Nama',
        'password' => 'Kata sandi',
        'password_confirm' => 'Konfirmasi kata sandi',
        'new_password' => 'Kata sandi baru',
        'new_password_confirmation' => 'Konfirmasi kata sandi baru',
        'token_name' => 'Nama token',
        'token_expiry' => 'Kedaluwarsa token',
        'abilities' => 'Hak akses',
        '2fa_code' => 'Kode',
        '2fa_recovery_code' => 'Kode pemulihan',
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
        'username_or_email' => 'Nama pengguna atau Email',
        'forgot_password_link' => 'Lupa kata sandi Anda?',
        'create_an_account' => 'Buat Akun',
    ],
    'registration' => [
        'title' => 'Daftar',
        'heading' => 'Buat Akun Baru',
        'submit' => [
            'label' => 'Daftar',
        ],
        'notification_unique' => 'Akun dengan alamat email ini sudah ada. Harap login.',
    ],
    'reset_password' => [
        'title' => 'Lupa Kata Sandi Anda?',
        'heading' => 'Atur Ulang Kata Sandi Anda',
        'submit' => [
            'label' => 'Kirim',
        ],
        'notification_error' => 'Terjadi Kesalahan: Harap coba lagi nanti.',
        'notification_error_link_text' => 'Coba Lagi',
        'notification_success' => 'Periksa email Anda untuk instruksi lebih lanjut!',
    ],
    'verification' => [
        'title' => 'Verifikasi Email Anda',
        'heading' => 'Verifikasi Email Diperlukan',
        'submit' => [
            'label' => 'Log Out',
        ],
        'notification_success' => 'Periksa email Anda untuk instruksi lebih lanjut!',
        'notification_resend' => 'Email verifikasi telah dikirim.',
        'before_proceeding' => 'Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.',
        'not_receive' => 'Jika Anda tidak menerima email tersebut,',
        'request_another' => 'Klik di sini untuk meminta email lain',
    ],
];
