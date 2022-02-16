<?php

return [
    "login" => [
        "forgot_password_link" => "Forgot password?",
        "create_an_account" => "create an account",
    ],
    "registration" => [
        "title" => "Register",
        "heading" => "Create a new account",
        "submit" => [
            "label" => "Sign up",
        ],
        "notification_unique" =>
            "An account with this email already exists. Please login.",
    ],
    "reset_password" => [
        "title" => "Forgot password",
        "heading" => "Reset your password",
        "submit" => [
            "label" => "Submit",
        ],
        "notification_error" => "Error: please try again later.",
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
        "before_proceeding" =>
            "Before proceeding, please check your email for a verification link.",
        "not_receive" => "If you did not receive the email,",
        "request_another" => "click here to request another one.",
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
            "subheading" => "Must be 8 characters.",
            "submit" => [
                "label" => "Update",
            ],
            "notify" => "Password updated successfully!",
        ],
        "sanctum" => [
            "title" => "API Tokens",
            "description" =>
                "Manage API tokens that allow third-party services to access this application on your behalf. NOTE: your token is shown once upon creation. If you lose your token, you will need to delete it and create a new one.",
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
        "name" => "Name",
        "email" => "Email",
        "password" => "Password",
        "password_confirm" => "Password confirm",
        "new_password" => "New password",
        "new_password_confirmation" => "Confirm password",
        "token_name" => "Token name",
        "abilities" => "Abilities",
    ],
    "or" => "Or",
];
