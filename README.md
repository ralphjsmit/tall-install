# Laravel TALL Preset with Domain Driven Design (DDD) structure

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ralphjsmit/tall-install.svg?style=flat-square)](https://packagist.org/packages/ralphjsmit/tall-install)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ralphjsmit/tall-install/run-tests?label=tests)](https://github.com/ralphjsmit/tall-install/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ralphjsmit/tall-install/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ralphjsmit/tall-install/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ralphjsmit/tall-install.svg?style=flat-square)](https://packagist.org/packages/ralphjsmit/tall-install)

This package provides a **simple artisan command for Laravel** that can **fully scaffold** your application and **jumpstart development**. 

It basically runs the installation process for all of your favourite packages, so that you can jumpstart development. 

### What does it install?

- [Tailwind CSS](https://tailwindcss.com)
- [Tailwind CSS Forms](https://tailwindcss.com/docs/plugins#forms)
- [Tailwind CSS Typography](https://tailwindcss.com/docs/plugins#typography)
- [Alpine.js](https://alpinejs.dev)
- [Alpine.js Trap](https://alpinejs.dev/plugins/trap)
- [Filament Admin Form Builder](https://filamentadmin.com/docs/2.x/forms/installation)
- [Filament Admin Table Builder](https://filamentadmin.com/docs/2.x/tables/installation)
- [Laravel Livewire](https://laravel-livewire.com)
- [Toast TALL-notifications](https://github.com/usernotnull/tall-toasts)

#### What can it install?

This package can also do the following things for you: 

- [Configure Browsersync for Laravel Valet users](https://ralphjsmit.com/laravel-valet-browsersync/)
- [Install Pest testing framework instead of PHPUnit](https://pestphp.com)
- Configure a DDD-file structure.

#### Roadmap

- Fortify installation

The intention of this package is to do all the backend installation and not force you into anything frontend-wise. 

Missing your favourite package? Feel free to submit an issue or a PR with your proposal.

## Installation & usage

To get started, you need a plain Laravel installation:

```bash
laravel new name

# or

composer create-project laravel/laravel name
```

Install the package via composer:

```bash
composer require ralphjsmit/tall-install
```

Now run the `tall-install` command:

```bash
php artisan tall-install
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
