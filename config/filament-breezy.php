<?php
// config for JeffGreco13/FilamentBreezy
return [
    /*
    |--------------------------------------------------------------------------
    | My Profile filament page
    |--------------------------------------------------------------------------
    | Whether or not to automatically register the My Profile page. Set this to false to extend and create your own page.
    */
    "enable_profile_page" => true,
    /*
    | Whether or not to automatically link the My Profile page in the user menu of Filament. NOTE: if enable_profile_page => false then this value is ignored and you'll need to register the item in your service provider manually.
    */
    "show_profile_page_in_user_menu" => true,
    /*
    | Whether or not to automatically display the My Profile page in the navigation of Filament. NOTE: if enable_profile_page => false then this value is ignored.
    */
    "show_profile_page_in_navbar" => false,
    /*
    | Customize the icon profile page icon in the navbar. Does not apply to the user menu.
    */
    "profile_page_icon" => 'heroicon-o-document-text',
    /*
    | Set an array that's compatible with the Filament Forms rules() method. You can also pass an instance of \Illuminate\Validation\Rules\Password::class. ex.\Illuminate\Validation\Rules\Password::min(8). Rules for required and confirmed are already set. These rules will apply to the My Profile, registration, and password reset forms.
    */
    "password_rules" => ['min:8'],

    /*
    |--------------------------------------------------------------------------
    | Auth / User configs
    |--------------------------------------------------------------------------
    | This is the Auth model used by Filament Teams.
    */
    "user_model" => config(
        "auth.providers.users.model",
        App\Models\User::class
    ),
    /*
    |--------------------------------------------------------------------------
    | The users table in your database.
    */
    "users_table" => "users",
    /*
    |--------------------------------------------------------------------------
    | The column to use for login/username authentication. NOTE: this may change to just 'login_field' in a later release.
    */
    "fallback_login_field" => "email",

    /*
    |--------------------------------------------------------------------------
    | Enable Two-Factor Authentication (2FA).
    */
    "enable_2fa" => false,
    /*
    |--------------------------------------------------------------------------
    | Number of seconds before asking the user to confirm their password in PasswordButtonAction again. 300 = 5 minutes
    */
    "password_confirmation_seconds" => 300,
    /*
    |--------------------------------------------------------------------------
    | The max-w-xx of the auth card used on all pages.
    */
    "auth_card_max_w" => "md",
    /*
    |--------------------------------------------------------------------------
    | Enable or disable registration.
    */
    "enable_registration" => true,
    /*
    |--------------------------------------------------------------------------
    | Enable or disable the reset password workflow.
    */
    "enable_reset_password" => true,
    /*
    |--------------------------------------------------------------------------
    | Path to registration Livewire component.
    */
    "registration_component_path" => \JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Register::class,
    /*
    |--------------------------------------------------------------------------
    | Path to password reset Livewire component.
    */
    "password_reset_component_path" => \JeffGreco13\FilamentBreezy\Http\Livewire\Auth\ResetPassword::class,
    /*
    |--------------------------------------------------------------------------
    | Path to email verification Livewire component.
    */
    "email_verification_component_path" => \JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Verify::class,
    /*
    |--------------------------------------------------------------------------
    | Where to redirect the user after registration.
    */
    "registration_redirect_url" => config("filament.home_url", "/"),
    /*
    |--------------------------------------------------------------------------
    | Enable sanctum api token management.
    */
    "enable_sanctum" => false,
    /*
    |--------------------------------------------------------------------------
    | Sanctum permissions
    */
    "sanctum_permissions" => ["create", "read", "update", "delete"],
];
