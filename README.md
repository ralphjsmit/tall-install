# Quickly scaffold a new Laravel-installation that uses the TALL-stack and install several opinionated packages.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ralphjsmit/tall-install.svg?style=flat-square)](https://packagist.org/packages/ralphjsmit/tall-install)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ralphjsmit/tall-install/run-tests?label=tests)](https://github.com/ralphjsmit/tall-install/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ralphjsmit/tall-install/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ralphjsmit/tall-install/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ralphjsmit/tall-install.svg?style=flat-square)](https://packagist.org/packages/ralphjsmit/tall-install)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require ralphjsmit/tall-install
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="tall-install_without_prefix-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --tag="tall-install_without_prefix-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="example-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$tall-install = new RalphJSmit\TallInstall();
echo $tall-install->echoPhrase('Hello, RalphJSmit!');
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

- [Ralph J. Smit](https://github.com/ralphjsmit)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
