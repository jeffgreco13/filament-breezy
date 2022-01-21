# A custom package for Filament with login flow, profile and teams support.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffgreco13/filament-breezy.svg?style=flat-square)](https://packagist.org/packages/jeffgreco13/filament-breezy)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/jeffgreco13/filament-breezy/run-tests?label=tests)](https://github.com/jeffgreco13/filament-breezy/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/jeffgreco13/filament-breezy/Check%20&%20fix%20styling?label=code%20style)](https://github.com/jeffgreco13/filament-breezy/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffgreco13/filament-breezy.svg?style=flat-square)](https://packagist.org/packages/jeffgreco13/filament-breezy)

The missing toolkit from Filament Admin with Breeze-like functionality. Includes login, registration, password reset, password confirmation, email verification, my profile page, and teams. All using the TALL-stack, all very Filament-y.

## Quick Start

This package works out-of-the-box with next to no configuration. To get started quickly, run the following command:

```bash
composer require jeffgreco13/filament-breezy && php artisan vendor:publish --tag="filament-breezy-migrations" && php artisan migrate
```

This will install the package, then publishes and runs the migrations.
Then, [add the `UserIsBreezy` trait](#installation) to your User model and that's it!

For more options, follow the Full Installation instructions below.

## Full Installation

1. Install the package via composer:

```bash
composer require jeffgreco13/filament-breezy
```

2. Publish the config file, then update models and table names BEFORE running your migrations.

```bash
php artisan vendor:publish --tag="filament-breezy-config"
```

3. Publish the migrations:

```bash
php artisan vendor:publish --tag="filament-breezy-migrations"
```

4. Run the migrations to create the Teams tables:

```bash
php artisan migrate
```

5. Add the `UserIsBreezy` trait to your User model:

```php
<?php namespace App;

use JeffGreco13\FilamentBreezy\Traits\UserIsBreezy;

class User extends Model
{
    use UserIsBreezy; // Add this trait to your model
    ...
}
```

6. Don't forget to dump composer autoload

```bash
composer dump-autoload
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-breezy-views"
```

## Usage

This package is extensively "borrowed" from the wonderful work of Marcel Pociot and the [Teamwork](https://github.com/mpociot/teamwork) package. You can get a full understanding of the capabilities by reviewing the [Teamwork docs](https://github.com/mpociot/teamwork#readme).

Similar to the `Teamwork` facade, you can access the same methods in the following way throughout your application:

```php
use JeffGreco13\FilamentTeams\FilamentTeams;

FilamentTeams::inviteToTeam($email, $team, function ($invite) {
    // Send email to user / let them know that they got invited
});
```

### Auth

#### Login

The Login class extends Filament's login Livewire component. Update the Filament config to point to the Breezy Login::class.

```php
"auth" => [
    "guard" => env("FILAMENT_AUTH_GUARD", "web"),
    "pages" => [
        "login" =>
            \JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Login::class,
    ],
],
```

#### Email Verification

Uses the [Laravel Email Verification](https://laravel.com/docs/8.x/verification) service.

Implement `MustVerifyEmail` on your User model:

```php
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
```

Then you can add the `verified` middleware to any of your routes:

```php
Route::get("/profile", function () {
    // Only verified users may access this route...
})->middleware("verified");
```

Or, force verified emails on your entire Filament Admin by adding the `EnsureEmailIsVerified` class to the auth middleware in Filament config:

```php
"middleware" => [
    "auth" => [
        Authenticate::class,
        Illuminate\Auth\Middleware\EnsureEmailIsVerified::class
    ],
    ....
```

#### Filament Livewire Components

All pages within the auth flow are full-page Livewire components made to work with Filament Forms. So you can easily extend any component to add your own fields and actions:

```php

use JeffGreco13\FilamentBreezy\Http\Livewire\Auth\Register as FilamentBreezyRegister;

class Register extends FilamentBreezyRegister
{

    protected function getFormSchema(): array
    {
        return array_merge(parent::getFormSchema(),[
            Forms\Components\Checkbox::make('consent_to_terms')->label('I consent to the terms of service and privacy policy.')->required()
        ]);
    }

    protected function getPreparedData($data): array
    {
        $preparedData = parent::getPreparedData($data);
        $preparedData['consent_to_terms'] = $data['consent_to_terms'];

        return $preparedData;
    }
...
```

#### Flash Notifications

The Breezy auth layouts use the `<x-filament::notification>` component to flash messages to the page. Flash messages in the same way as you would with `$this->notify()` but instead flash to the session:

```php
session()->flash("notify", [
    "status" => "success",
    "message" => "Check your inbox for instructions.",
]);
```

### User Model & Resource

With the `UserHasTeams` trait added to the User model, you expose many new methods including the `teams()` relationship.
For example, to display a user's teams and the current team name in the resource table, you can add the following columns:

```php
Tables\Columns\BadgeColumn::make("current_team_id")->label(
    "Current team"
)->getStateUsing(fn($record) => $record->currentTeam?->name),
Tables\Columns\TagsColumn::make("teams")->getStateUsing(
    fn($record) => $record
        ->teams()
        ->pluck("name")
        ->toArray()
),
```

You can manage a User's current team and/or team associations with the following form components:

```php
Forms\Components\Select::make("current_team_id")
    ->label("Current team")
    ->options(fn($record) => $record->teams()->pluck("name", "id")),
Forms\Components\BelongsToManyMultiSelect::make("teams")
    ->relationship("teams", "name"),
```

### Custom Models, Resources & Widgets

You can extend any of the models, resources and widgets like so:

```php
use JeffGreco13\FilamentTeams\Resources\FilamentTeamResource;

class TeamResource extends FilamentTeamResource
{
    protected static function getNavigationIcon(): string
    {
        return "heroicon-o-lock-open";
    }

    // You can override any Resource method to use your own instead of those provided by FilamentTeams
    public static function getPages(): array
    {
        return [
            "index" => Pages\ListUsers::route("/"),
            "create" => Pages\CreateUser::route("/create"),
            "edit" => Pages\EditUser::route("/{record}/edit"),
        ];
    }
}
```

Then, simply update the path in your config file to override:

```php
"team_model" => JeffGreco13\FilamentTeams\Models\FilamentTeam::class,
...
"enable_team_resource" => false,
... etc.
```

The invitations_send_widget, by default, will only show to the current team's owner.

### Custom Configurations & Nuances

A few things to be aware of:

1. When a Team is deleted, this change does not cascade to `current_team_id` on the User model.
1. When a User is deleted, this change does not cascade to `owner_id` on the Team model.
1. The `current_team_id` value on the User model is not automatically set in any way. You are responsible for writing your own logic to control this.

#### Middleware

You can add the EnsureValidTeam middleware to your Filament config in the 'auth' array after Authenticate if you wish to circumvent a potential security issue. If the `current_team_id` column is set on the User model but the User is no longer a member of that Team, it will still load that information (security flaw). This middleware will attempt to load the next available team or set `current_team_id` to null.

You can also add the `TeamOwner` middleware if you want to limit Filament access to Owners of teams only.

If this doesn't quite fit your need, feel free to write your own middleware and include it here.

```php
"middleware" => [
    "auth" => [
        Authenticate::class,
        ...
        \JeffGreco13\FilamentTeams\Http\Middleware\EnsureValidTeam::class,
        ...
        \JeffGreco13\FilamentTeams\Http\Middleware\TeamOwner::class,
    ],
    ...
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Jeff Greco](https://github.com/jeffgreco13)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
