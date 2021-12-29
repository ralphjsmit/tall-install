# Laravel TALL Install Command

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ralphjsmit/tall-install.svg?style=flat-square)](https://packagist.org/packages/ralphjsmit/tall-install)
[![run-tests](https://github.com/ralphjsmit/tall-install/actions/workflows/run-tests.yml/badge.svg?event=push)](https://github.com/ralphjsmit/tall-install/actions/workflows/run-tests.yml)
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

<br>

## Contents

1. [Installation & usage](#installation--usage)

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

You can use the following flags to install a particular package.

<br>

## Configure DDD with `tall-install --ddd`

You may use the `--ddd` or `-d` flag to configure DDD:

```bash
php artisan tall-install --ddd
```

This is the most powerful feature, as it rewrites your `/app` directory to this:

```
/src/Support
     ├── App
         ├── Console
         ├── Exceptions
         ├── HTTP
         ├── Providers
         ├── Application.php
     ├── Models
         User.php
     ├── View/Components/Layouts
         App.php
         Admin.php
src/Domain
     // Add your own 'domains' here. Domains are where the business logic of the application is.
     ├── Invoices...
     ├── Customers...
src/App
     // Add your own 'apps' here. Apps are the exposed to the outside (like APIs, a dashboard, a separate admin panel) or are your infrastructure (jobs).
     ├── Console
     ├── Jobs
     ├── Api
```

For me, once I started using DDD I never wanted anything else. A good reference is the [Laravel Beyond CRUD](https://laravel-beyond-crud.com) course by Brent Roose.


## Install Pest with `tall-install --pest`

You may use the `--pest` or `-p` flag to configure Pest:

```bash
php artisan tall-install --pest
```

### Install Browsersync with `tall-install --browsersync`

You may use the `--browsersync` or `-b` flag to configure Browsersync for Laravel Valet:

```bash
php artisan tall-install --browsersync
```

This will append the following code to your `webpack.mix.js` file:

```js
/* Browsersync configuration with Laravel Valet */
mix.disableSuccessNotifications();

const domain = 'valetDomain.test';
const homedir = require('os').homedir();

mix.browserSync({
    proxy: 'https://' + domain,
    host: domain,
    open: 'external',
    https: {
        key: homedir + '/.config/valet/Certificates/' + domain + '.key',
        cert: homedir + '/.config/valet/Certificates/' + domain + '.crt'
    },
    notify: false, //Disable notifications
})
```

By default it takes the current folder name as the domain for Valet. You may specify a custom domain with the `--url` flag:

```bash
php artisan tall-install --browsersync --url=custom.test
```

## General

🐞 If you spot a bug, please submit a detailed issue, and wait for assistance.

🔐 If you discover a vulnerability, please review [our security policy](../../security/policy).

🙋‍♂️ [Ralph J. Smit](https://ralphjsmit.com)
