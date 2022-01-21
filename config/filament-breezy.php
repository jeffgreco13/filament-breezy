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
        Set an array that's compatible with the Filament Forms rules() method. You can also pass an instance of \Illuminate\Validation\Rules\Password::class.
        Rules for required and confirmed are already set.
        These rules will apply to the My Profile, registration, and password reset forms.
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

    "registration_redirect_url" => config("filament.home_url", "/"),
    /*
    |--------------------------------------------------------------------------
    | Teams configurations
    |--------------------------------------------------------------------------
    |--------------------------------------------------------------------------
    | Whether or not Teams functionality is enabled.
    */
    "enable_teams" => true,
    /*
    | The path to your Team model. Update this to extend or override the Team model.
    */
    "team_model" => JeffGreco13\FilamentBreezy\Models\FilamentTeam::class,
    /*
    |--------------------------------------------------------------------------
    | The teams table in your database. Change this before running migrations, ex. `clients`
    */
    "teams_table" => "teams",
    /*
    |--------------------------------------------------------------------------
    | The team_user assoc. table in your database. Change this if you changed the teams_table, ex. `client_user`
    */
    "team_user_table" => "team_user",
    /*
    |--------------------------------------------------------------------------
    | Set this to false if you would like to use your own TeamResource class.
    */
    "enable_team_resource" => true,
    /*
    |--------------------------------------------------------------------------
    | Update the Teams resource navigation details.
    */
    "team_navigation_label" => "Teams",
    "team_navigation_icon" => "heroicon-o-user-group",
    /*
    |--------------------------------------------------------------------------
    | When set to true, the association in team_users will be made automatically when the owner is saved. This helps ensure that owners will appear in all relationship methods.
    */
    "sync_owner_as_team_member" => true,
    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Teams's team_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    "user_foreign_key" => "id",

    /*
    |--------------------------------------------------------------------------
    | Teams Invitations
    |--------------------------------------------------------------------------
    |
    | This is the Team Invite model used by Teams to create correct relations.
    | Update the team if it is in a different namespace.
    |
    */
    "invite_model" => JeffGreco13\FilamentBreezy\Models\TeamInvite::class,
    /*
    | The team invitations table in your database.
    */
    "team_invites_table" => "team_invites",
    /*
    | Path to the invitations Filament widgets
    */
    "enable_send_widget" => true,
    "enable_manage_invites_widget" => false,
];
