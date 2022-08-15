<?php

return [
    "login" => [
        "username_or_email" => "Username atau Email",
        "forgot_password_link" => "Lupa kata sandi?",
        "create_an_account" => "Buat akun",
    ],
    "two_factor" => [
        "heading" => "Two Factor Challenge",
        "description" => "Harap konfirmasi akses ke akun Anda dengan memasukkan kode autentikasi yang telah diberikan oleh aplikasi autentikator Anda.",
        "code_placeholder" => "XXX-XXX",
        "recovery" => [
            "heading" => "Two Factor Challenge",
            "description" => "Harap konfirmasi akses ke akun Anda dengan memasukkan salah satu dari kode pemulihan darurat Anda.",
        ],
        "recovery_code_placeholder" => "abcdef-98765",
        "recovery_code_text" => "Perangkat hilang?",
        "recovery_code_link" => "Gunakan kode pemulihan",
        "back_to_login_link" => "Kembali ke login"
    ],
    "registration" => [
        "title" => "Register",
        "heading" => "Buat akun baru",
        "submit" => [
            "label" => "Daftar",
        ],
        "notification_unique" => "Akun dengan email ini telah terdaftar. Harap login.",
    ],
    "reset_password" => [
        "title" => "Forgot password",
        "heading" => "Atur ulang kata sandi",
        "submit" => [
            "label" => "Kirim",
        ],
        "notification_error" => "Error: harap coba beberapa saat lagi.",
        "notification_error_link_text"=>"Try Again",
        "notification_success" => "Periksa inbox Anda untuk instruksi selanjutnya!",
    ],
    "verification" => [
        "title" => "Verify email",
        "heading" => "Verifikasi email dibutuhkan",
        "submit" => [
            "label" => "Keluar",
        ],
        "notification_success" => "Periksa inbox Anda untuk instruksi selanjutnya!",
        "notification_resend" => "Email verifikasi telah dikirimkan kembali.",
        "before_proceeding" => "Sebelum melanjutkan, harap periksa email Anda untuk tautan verifikasi.",
        "not_receive" => "Jika Anda tidak menerima email,",
        "request_another" => "klik di sini untuk meminta kembali",
    ],
    "profile" => [
        "account" => "Account",
        "profile" => "Profil",
        "my_profile" => "Profil saya",
        "personal_info" => [
            "heading" => "Informasi Pribadi",
            "subheading" => "Kelola informasi pribadi Anda.",
            "submit" => [
                "label" => "Perbarui",
            ],
            "notify" => "Profil berhasil diperbarui!",
        ],
        "password" => [
            "heading" => "Password",
            "subheading" => "Harus 8 karakter.",
            "submit" => [
                "label" => "Perbarui",
            ],
            "notify" => "Kata sandi berhasil diperbarui!",
        ],
        "2fa" => [
            "title" => "Two Factor Authentication",
            "description" => "Atur 2 factor authentication untuk akun Anda (disarankan).",
            "actions" => [
                "enable" => "Aktifkan",
                "regenerate_codes"=>"Buat ulang kode",
                "disable"=>"Nonaktifkan",
                "confirm_finish" => "Konfirmasi & selesai",
                "cancel_setup" => "Batalkan pengaturan"
            ],
            "setup_key" => "Kunci pengaturan",
            "not_enabled" => [
                "title" => "Anda belum mengaktifkan two factor authentication.",
                "description"=>"Ketika two factor authentication aktif, Anda akan diminta token acak yang aman saat autentikasi. Anda mungkin menerima token ini dari aplikasi Google Authenticator dari ponsel Anda."
            ],
            "finish_enabling" => [
                "title"=>"Selesai mengaktifkan two factor authentication.",
                "description" => "Untuk selesai mengaktifkan two factor authentication, scan QR code berikut menggunakan aplikasi authenticator dari ponsel Anda atau masukkan kunci pengaturan dan masukkan kode OTP yang dihasilkan."
            ],
            "enabled"=>[
                "title"=>"Anda telah mengaktifkan two factor authentication!",
                "description"=>"Two factor authentication sudah diaktifkan. Scan QR code berikut menggunakan aplikasi authenticator ponsel Anda atau masukkan kunci pengaturan.",
                "store_codes"=>"Simpan kode pemulihan ini di tempat yang aman. Kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat two factor authentication Anda hilang.",
                "show_codes"=>'Perlihatkan Kode Pemulihan',
                "hide_codes" => 'Sembunyikan Kode Pemulihan'
            ],
            "confirmation" => [
                "success_notification" => 'Kode terverifikasi. Two factor authentication diaktifkan.',
                "invalid_code" => "Kode yang Anda masukkan tidak valid."
            ]
        ],
        "sanctum" => [
            "title" => "API Tokens",
            "description" => "Kelola token API yang memungkinkan layanan pihak ketiga mengakses aplikasi ini atas nama Anda. CATATAN: token Anda ditampilkan sekali setelah dibuat. Jika Anda kehilangan token, Anda harus menghapusnya dan membuat yang baru.",
            "create" => [
                "notify" => "Token berhasil dibuat!",
                "submit" => [
                    "label" => "Buat",
                ],
            ],
            "update" => [
                "notify" => "Token berhasil diperbarui!",
            ],
        ],
    ],
    "fields" => [
        "email" => "Email",
        "login" => "Login",
        "name" => "Nama",
        "password" => "Kata Sandi",
        "password_confirm" => "Konfirmasi Kata Sandi",
        "new_password" => "Kata Sandi Baru",
        "new_password_confirmation" => "Konfirmasi Kata Sandi Baru",
        "token_name" => "Nama Token",
        "abilities" => "Kemampuan",
        "2fa_code" => "Kode",
        "2fa_recovery_code" => "Kode Pemulihan"
    ],
    "or" => "Atau",
    "cancel" => "Batal"
];
