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
    | Set an array that's compatible with the Filament Forms rules() method. You can also pass an instance of \Illuminate\Validation\Rules\Password::class. Rules for required and confirmed are already set. These rules will apply to the My Profile, registration, and password reset forms.
    */
    "password_rules" => [\Illuminate\Validation\Rules\Password::min(8)],

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
    | Enable or disable registration.
    */
    "enable_registration" => true,
    /*
    |--------------------------------------------------------------------------
    | Where to redirect the user after registration.
    */
    "registration_redirect_url" => config("filament.home_url", "/"),
];
