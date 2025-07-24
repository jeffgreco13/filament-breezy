<?php

return [
    'password_confirm' => [
        'heading' => 'Konfirmasi Kata Sandi',
        'description' => 'Masukkan kata sandi Anda untuk melanjutkan tindakan ini.', 
        'current_password' => 'Kata Sandi Saat Ini',
    ],
    'two_factor' => [
        'heading' => 'Verifikasi Dua Faktor', 
        'description' => 'Masukkan kode dari aplikasi autentikator Anda untuk verifikasi.', 
        'code_placeholder' => 'XXX-XXX',
        'recovery' => [
            'heading' => 'Gunakan Kode Pemulihan', 
            'description' => 'Masukkan salah satu kode pemulihan darurat untuk mengakses akun Anda.',
        ],
        'recovery_code_placeholder' => 'abcdef-98765',
        'recovery_code_text' => 'Kehilangan perangkat?',
        'recovery_code_link' => 'Gunakan kode pemulihan',
        'back_to_login_link' => 'Kembali ke halaman login',
    ],
    'profile' => [
        'account' => 'Akun',
        'profile' => 'Profil',
        'my_profile' => 'Profil Saya',
        'subheading' => 'Kelola informasi dan pengaturan profil Anda di sini.',
        'personal_info' => [
            'heading' => 'Informasi Pribadi',
            'subheading' => 'Perbarui data diri Anda.', 
            'submit' => [
                'label' => 'Simpan Perubahan', 
            ],
            'notify' => 'Profil berhasil diperbarui!',
        ],
        'password' => [
            'heading' => 'Kata Sandi',
            'subheading' => 'Minimal harus 8 karakter.',
            'submit' => [
                'label' => 'Perbarui Kata Sandi', 
            ],
            'notify' => 'Kata sandi berhasil diperbarui!',
        ],
        '2fa' => [
            'title' => 'Autentikasi Dua Faktor (2FA)',
            'description' => 'Amankan akun Anda dengan lapisan verifikasi tambahan (disarankan).', 
            'actions' => [
                'enable' => 'Aktifkan',
                'regenerate_codes' => 'Buat Ulang Kode Pemulihan',
                'disable' => 'Nonaktifkan',
                'confirm_finish' => 'Konfirmasi & Selesai',
                'cancel_setup' => 'Batalkan Pengaturan',
            ],
            'setup_key' => 'Kunci Pengaturan (Setup Key)',
            'must_enable' => 'Anda wajib mengaktifkan Autentikasi Dua Faktor untuk melanjutkan.', 
            'not_enabled' => [
                'title' => 'Autentikasi Dua Faktor belum aktif.',
                'description' => 'Jika diaktifkan, Anda akan diminta token keamanan saat login. Anda bisa mendapatkannya dari aplikasi seperti Google Authenticator, Microsoft Authenticator, dan sebagainya.', 
            ],
            'finish_enabling' => [
                'title' => 'Selesaikan Proses Aktivasi 2FA',
                'description' => 'Pindai kode QR ini menggunakan aplikasi autentikator Anda, atau masukkan Kunci Pengaturan untuk mendapatkan kode OTP.',
            ],
            'enabled' => [
                'notify' => 'Autentikasi Dua Faktor berhasil diaktifkan.',
                'title' => 'Anda berhasil mengaktifkan Autentikasi Dua Faktor!',
                'description' => 'Kini akun Anda jadi lebih aman dengan lapisan verifikasi tambahan.',
                'store_codes' => 'Simpan kode pemulihan ini di tempat yang aman. Kode ini berguna jika Anda kehilangan akses ke perangkat Anda. Perhatian: Kode ini hanya ditampilkan sekali.', 
            ],
            'disabling' => [
                'notify' => 'Autentikasi dua faktor telah dinonaktifkan.',
            ],
            'regenerate_codes' => [
                'notify' => 'Kode pemulihan baru telah dibuat.',
            ],
            'confirmation' => [
                'success_notification' => 'Kode terverifikasi. Autentikasi Dua Faktor kini aktif.',
                'invalid_code' => 'Kode yang Anda masukkan salah atau tidak valid.',
            ],
        ],
        'sanctum' => [
            'title' => 'Token API',
            'description' => 'Kelola token API agar layanan pihak ketiga dapat mengakses aplikasi ini atas nama Anda.',
            'create' => [
                'notify' => 'Token berhasil dibuat!',
                'message' => 'Token hanya ditampilkan sekali saat dibuat. Jika hilang, Anda perlu menghapus dan membuat token baru.',
                'submit' => [
                    'label' => 'Buat Token',
                ],
            ],
            'update' => [
                'notify' => 'Token berhasil diperbarui!',
                'submit' => [
                    'label' => 'Simpan',
                ],
            ],
            'copied' => [
                'label' => 'Saya sudah menyalin token ini',
            ],
        ],
        'browser_sessions' => [
            'heading' => 'Sesi Login Perangkat', 
            'subheading' => 'Kelola sesi aktif Anda di berbagai perangkat.',
            'label' => 'Sesi Login',
            'content' => 'Jika perlu, Anda bisa keluar dari semua sesi di perangkat lain. Beberapa sesi terakhir Anda ditampilkan di bawah ini, namun daftarnya mungkin tidak lengkap. Jika Anda merasa akun Anda diretas, sebaiknya segera perbarui kata sandi Anda.', 
            'device' => 'Perangkat ini',
            'last_active' => 'Terakhir aktif',
            'logout_other_sessions' => 'Keluarkan dari Perangkat Lain', 
            'logout_heading' => 'Keluarkan dari Perangkat Lain',
            'logout_description' => 'Masukkan kata sandi untuk konfirmasi mengeluarkan semua sesi login Anda di perangkat lain.',
            'logout_action' => 'Ya, Keluarkan Semua', 
            'incorrect_password' => 'Kata sandi yang Anda masukkan salah. Mohon coba lagi.',
            'logout_success' => 'Berhasil keluar dari semua perangkat lain.',
        ],
    ],
    'clipboard' => [
        'link' => 'Salin ke Clipboard',
        'tooltip' => 'Tersalin!',
    ],
    'fields' => [
        'avatar' => 'Avatar',
        'email' => 'Email',
        'login' => 'Login',
        'name' => 'Nama',
        'password' => 'Kata Sandi',
        'password_confirm' => 'Konfirmasi Kata Sandi',
        'new_password' => 'Kata Sandi Baru',
        'new_password_confirmation' => 'Ulangi Kata Sandi Baru', 
        'token_name' => 'Nama Token',
        'token_expiry' => 'Masa Berlaku Token', 
        'abilities' => 'Hak Akses',
        '2fa_code' => 'Kode Verifikasi (6 digit)',
        '2fa_recovery_code' => 'Kode Pemulihan',
        'created' => 'Dibuat pada',
        'expires' => 'Kedaluwarsa pada',
    ],
    'or' => 'Atau',
    'cancel' => 'Batal',
];