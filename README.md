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

```php
$filamentBreezy = new JeffGreco13\FilamentBreezy();
echo $filamentBreezy->echoPhrase("Hello, JeffGreco13!");
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
