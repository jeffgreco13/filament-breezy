<?php

return [
    'password_confirm' => [
        'heading' => 'Konfirmasi Kata Sandi',
        'description' => 'Harap konfirmasi kata sandi Anda untuk menyelesaikan tindakan ini.',
        'current_password' => 'Kata sandi saat ini',
    ],
    'two_factor' => [
        'heading' => 'Tantangan Dua Faktor',
        'description' => 'Harap konfirmasi akses ke akun Anda dengan memasukkan kode yang diberikan oleh aplikasi autentikator Anda.',
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Tantangan Dua Faktor',
            'description' => 'Harap konfirmasi akses ke akun Anda dengan memasukkan salah satu kode pemulihan darurat Anda.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Perangkat hilang?',
        'recovery_code_link' => 'Gunakan kode pemulihan',
        'back_to_login_link' => 'Kembali ke login',
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
            'notify' => 'Profil berhasil diperbarui!',
        ],
        'password' => [
            'heading' => 'Kata Sandi',
            'subheading' => 'Minimal 8 karakter.',
            'submit' => [
                'label' => 'Perbarui',
            ],
            'notify' => 'Kata sandi berhasil diperbarui!',
        ],
        '2fa' => [
            'title' => 'Autentikasi Dua Faktor',
            'description' => 'Kelola autentikasi dua faktor untuk akun Anda (disarankan).',
            'actions' => [
                'enable' => 'Aktifkan',
                'regenerate_codes' => 'Buat Ulang Kode Pemulihan',
                'disable' => 'Nonaktifkan',
                'confirm_finish' => 'Konfirmasi & Selesai',
                'cancel_setup' => 'Batalkan Pengaturan',
            ],
            'setup_key' => 'Kunci Pengaturan',
            'must_enable' => 'Anda harus mengaktifkan autentikasi dua faktor untuk menggunakan aplikasi ini.',
            'not_enabled' => [
                'title' => 'Anda belum mengaktifkan autentikasi dua faktor.',
                'description' => 'Saat autentikasi dua faktor diaktifkan, Anda akan diminta memasukkan token acak yang aman saat login. Anda dapat menggunakan aplikasi autentikator seperti Google Authenticator atau Microsoft Authenticator untuk proses ini.',
            ],
            'finish_enabling' => [
                'title' => 'Selesaikan Pengaktifan Autentikasi Dua Faktor',
                'description' => 'Untuk menyelesaikan pengaktifan, pindai kode QR berikut menggunakan aplikasi autentikator di ponsel Anda, atau masukkan kunci pengaturan dan kode OTP yang dihasilkan.',
            ],
            'enabled' => [
                'notify' => 'Autentikasi dua faktor berhasil diaktifkan.',
                'title' => 'Autentikasi dua faktor telah diaktifkan!',
                'description' => 'Autentikasi dua faktor kini aktif. Ini membantu meningkatkan keamanan akun Anda.',
                'store_codes' => 'Kode-kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat Anda hilang. Peringatan! Kode hanya akan ditampilkan satu kali.',
            ],
            'disabling' => [
                'notify' => 'Autentikasi dua faktor telah dinonaktifkan.',
            ],
            'regenerate_codes' => [
                'notify' => 'Kode pemulihan baru telah dibuat.',
            ],
            'confirmation' => [
                'success_notification' => 'Kode berhasil diverifikasi. Autentikasi dua faktor diaktifkan.',
                'invalid_code' => 'Kode yang Anda masukkan tidak valid.',
            ],
        ],
        'sanctum' => [
            'title' => 'Token API',
            'description' => 'Kelola token API yang memungkinkan layanan pihak ketiga mengakses aplikasi ini atas nama Anda.',
            'create' => [
                'notify' => 'Token berhasil dibuat!',
                'message' => 'Token Anda hanya ditampilkan sekali saat dibuat. Jika Anda kehilangan token ini, Anda harus menghapus dan membuat yang baru.',
                'submit' => [
                    'label' => 'Buat',
                ],
            ],
            'update' => [
                'notify' => 'Token berhasil diperbarui!',
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
            'content' => 'Jika diperlukan, Anda dapat keluar dari semua sesi browser lain di semua perangkat Anda. Beberapa sesi terakhir Anda ditampilkan di bawah ini, namun daftar ini mungkin tidak lengkap. Jika Anda merasa akun Anda telah disusupi, sebaiknya ubah juga kata sandi Anda.',
            'device' => 'Perangkat ini',
            'last_active' => 'Terakhir aktif',
            'logout_other_sessions' => 'Keluar dari Sesi Browser Lain',
            'logout_heading' => 'Keluar dari Sesi Browser Lain',
            'logout_description' => 'Masukkan kata sandi Anda untuk mengonfirmasi bahwa Anda ingin keluar dari semua sesi browser lain di semua perangkat Anda.',
            'logout_action' => 'Keluar dari Sesi Browser Lain',
            'incorrect_password' => 'Kata sandi yang Anda masukkan salah. Silakan coba lagi.',
            'logout_success' => 'Semua sesi browser lainnya berhasil dikeluarkan.',
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
        'password' => 'Kata Sandi',
        'password_confirm' => 'Konfirmasi Kata Sandi',
        'new_password' => 'Kata Sandi Baru',
        'new_password_confirmation' => 'Konfirmasi Kata Sandi Baru',
        'token_name' => 'Nama Token',
        'token_expiry' => 'Kedaluwarsa Token',
        'abilities' => 'Hak Akses',
        '2fa_code' => 'Kode',
        '2fa_recovery_code' => 'Kode Pemulihan',
        'created' => 'Dibuat',
        'expires' => 'Kedaluwarsa',
    ],
    'or' => 'Atau',
    'cancel' => 'Batal',
];
