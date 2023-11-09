<?php

return [
    "password_confirm" => [
        "heading" => "Konfirmasi kata sandi",
        "description" => "Harap konfirmasi kata sandi Anda untuk melanjutkan.",
        "current_password" => "Current password"
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
    "profile" => [
        "account" => "Akun",
        "profile" => "Profil",
        "my_profile" => "Profil saya",
        "subheading" => "Kelola profil pengguna Anda di sini.",
        "personal_info" => [
            "heading" => "Informasi Pribadi",
            "subheading" => "Kelola informasi pribadi Anda.",
            "submit" => [
                "label" => "Perbarui",
            ],
            "notify" => "Profil berhasil diperbarui!",
        ],
        "password" => [
            "heading" => "Kata sandi",
            "subheading" => "Harus 8 karakter atau lebih.",
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
                "regenerate_codes"=>"Buat Ulang Kode Pemulihan",
                "disable"=>"Nonaktifkan",
                "confirm_finish" => "Konfirmasi & selesai",
                "cancel_setup" => "Batalkan pengaturan"
            ],
            "setup_key" => "Kunci pengaturan",
            "must_enable" => "Anda harus mengaktifkan Two Factor Authentication untuk menggunakan aplikasi ini.",
            "not_enabled" => [
                "title" => "Anda belum mengaktifkan two factor authentication.",
                "description"=>"Ketika two factor authentication aktif, Anda akan diminta token acak yang aman saat autentikasi. Anda dapat menerima token ini dari aplikasi Google Authenticator di ponsel Anda."
            ],
            "finish_enabling" => [
                "title" => "Selesaikan pengaktifan two factor authentication.",
                "description" => "Untuk menyelesaikan pengaktifan two factor authentication, scan QR code berikut menggunakan aplikasi authenticator dari ponsel Anda atau masukkan kunci pengaturan dan masukkan kode OTP yang dihasilkan."
            ],
            "enabled"=>[
                "notify" => "Two factor authentication diaktifkan.",
                "title" => "Anda telah mengaktifkan two factor authentication!",
                "description" => "Two factor authentication sudah diaktifkan. Scan QR code berikut menggunakan aplikasi authenticator ponsel Anda atau gunakan kunci pengaturan lalu masukkan OTP yang dihasilkan.",
                "store_codes" => "Simpan kode pemulihan ini di tempat yang aman. Kode ini dapat digunakan untuk memulihkan akses ke akun Anda jika perangkat two factor authentication Anda tidak dapat digunakan. Penting! Kode ini hanya ditampilkan satu kali.",
            ],
            "disabling" => [
                "notify" => "Two factor authentication telah dinonaktifkan."
            ],
            "regenerate_codes" => [
                "notify" => "Kode pemulihan baru telah dibuat."
            ],
            "confirmation" => [
                "success_notification" => 'Kode terverifikasi. Two factor authentication diaktifkan.',
                "invalid_code" => "Kode yang Anda masukkan tidak valid."
            ]
        ],
        "sanctum" => [
            "title" => "Token API",
            "description" => "Kelola token API yang memungkinkan layanan pihak ketiga mengakses aplikasi ini atas nama Anda.",
            "create" => [
                "notify" => "Token berhasil dibuat!",
                "message" => "Token hanya ditampilkan sekali setelah dibuat. Jika Anda kehilangan token, Anda harus menghapusnya dan membuat yang baru.",
                "submit" => [
                    "label" => "Buat",
                ],
            ],
            "update" => [
                "notify" => "Token berhasil diperbarui!",
            ],
            "copied" => [
                "label" => "Saya telah menyalin token saya"
            ]
        ],
    ],
    "clipboard" => [
        "link" => "Salin ke clipboard",
        "tooltip" => "Disalin!"
    ],
    "fields" => [
        "avatar" => "Avatar",
        "email" => "Email",
        "login" => "Login",
        "name" => "Nama",
        "password" => "Kata Sandi",
        "password_confirm" => "Konfirmasi kata sandi",
        "new_password" => "Kata sandi baru",
        "new_password_confirmation" => "Konfirmasi kata sandi baru",
        "token_name" => "Nama token",
        "token_expiry" => "Kedaluwarsa token",
        "abilities" => "Hak akses",
        "2fa_code" => "Kode",
        "2fa_recovery_code" => "Kode Pemulihan",
        'created' => 'Dibuat',
        'expires' => "Kedaluwarsa",
    ],
    "or" => "Atau",
    "cancel" => "Batal"
];
