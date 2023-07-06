<?php

return [
    "login" => [
        "username_or_email" => "Username or Email",
        "forgot_password_link" => "Forgot password?",
        "create_an_account" => "create an account",
    ],
    "password_confirm" => [
        "heading" => "Confirm password",
        "description" => "Please confirm your password to complete this action.",
        "current_password" => "Current password"
    ],
    "two_factor" => [
        "heading" => "Two Factor Challenge",
        "description" => "Please confirm access to your account by entering the authentication code provided by your authenticator application.",
        "code_placeholder" => "XXX-XXX",
        "recovery" => [
            "heading" => "Two Factor Challenge",
            "description" => "Please confirm access to your account by entering one of your emergency recovery codes.",
        ],
        "recovery_code_placeholder" => "abcdef-98765",
        "recovery_code_text" => "Lost device?",
        "recovery_code_link" => "Use a recovery code",
        "back_to_login_link" => "Back to login"
    ],
    "registration" => [
        "title" => "Register",
        "heading" => "Create a new account",
        "submit" => [
            "label" => "Sign up",
        ],
        "notification_unique" => "An account with this email already exists. Please login.",
    ],
    "reset_password" => [
        "title" => "Forgot password",
        "heading" => "Reset your password",
        "submit" => [
            "label" => "Submit",
        ],
        "notification_error" => "Error resetting password. Please request a new password reset.",
        "notification_error_link_text" => "Try Again",
        "notification_success" => "Check your inbox for instructions!",
    ],
    "verification" => [
        "title" => "Verify email",
        "heading" => "Email verification required",
        "submit" => [
            "label" => "Sign out",
        ],
        "notification_success" => "Check your inbox for instructions!",
        "notification_resend" => "Verification email has been resent.",
        "before_proceeding" => "Before proceeding, please check your email for a verification link.",
        "not_receive" => "If you did not receive the email,",
        "request_another" => "click here to request another one",
    ],
    "profile" => [
        "account" => "Account",
        "profile" => "Profile",
        "my_profile" => "My Profile",
        "personal_info" => [
            "heading" => "Personal Information",
            "subheading" => "Manage your personal information.",
            "submit" => [
                "label" => "Update",
            ],
            "notify" => "Profile updated successfully!",
        ],
        "password" => [
            "heading" => "Password",
            "subheading" => "Must be at least 8 characters long.",
            "submit" => [
                "label" => "Update",
            ],
            "notify" => "Password updated successfully!",
        ],
        "2fa" => [
            "title" => "Two Factor Authentication",
            "description" => "Manage 2 factor authentication for your account (recommended).",
            "actions" => [
                "enable" => "Enable",
                "regenerate_codes" => "Regenerate Codes",
                "disable" => "Disable",
                "confirm_finish" => "Confirm & finish",
                "cancel_setup" => "Cancel setup"
            ],
            "setup_key" => "Setup key",
            "not_enabled" => [
                "title" => "You have not enabled two factor authentication.",
                "description" => "When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application."
            ],
            "finish_enabling" => [
                "title" => "Finish enabling two factor authentication.",
                "description" => "To finish enabling two factor authentication, scan the following QR code using your phone's authenticator application or enter the setup key and provide the generated OTP code."
            ],
            "enabled" => [
                "title" => "You have enabled two factor authentication!",
                "description" => "Two factor authentication is now enabled. This helps make your account more secure.",
                "store_codes" => "Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.",
                "show_codes" => 'Show Recovery Codes',
                "hide_codes" => 'Hide Recovery Codes'
            ],
            "confirmation" => [
                "success_notification" => 'Code verified. Two factor authentication enabled.',
                "invalid_code" => "The code you have entered is invalid."
            ]
        ],
        "sanctum" => [
            "title" => "API Tokens",
            "description" => "Manage API tokens that allow third-party services to access this application on your behalf. NOTE: your token is shown once upon creation. If you lose your token, you will need to delete it and create a new one.",
            "create" => [
                "notify" => "Token created successfully!",
                "submit" => [
                    "label" => "Create",
                ],
            ],
            "update" => [
                "notify" => "Token updated successfully!",
            ],
        ],
    ],
    "fields" => [
        "email" => "Email",
        "login" => "Login",
        "name" => "Name",
        "password" => "Password",
        "password_confirm" => "Password confirm",
        "new_password" => "New password",
        "new_password_confirmation" => "Confirm password",
        "token_name" => "Token name",
        "abilities" => "Abilities",
        "2fa_code" => "Code",
        "2fa_recovery_code" => "Recovery Code"
    ],
    "or" => "Or",
    "cancel" => "Cancel"
];
