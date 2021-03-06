![Tall-Install Banner](https://github.com/ralphjsmit/tall-install/blob/main/docs/images/tall-install.jpg)

# Easy command to install the TALL-stack & jumpstart development🚀

[![Run Package Tests](https://github.com/ralphjsmit/tall-install/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/ralphjsmit/tall-install/actions/workflows/run-tests.yml)
[![Run Laravel Tests (Pest) (normal version)](https://github.com/ralphjsmit/tall-install-demo/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/ralphjsmit/tall-install-demo/actions/workflows/run-tests.yml)
[![Run Laravel Tests (Pest) (DDD-version)](https://github.com/ralphjsmit/tall-install-ddd-demo/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/ralphjsmit/tall-install-ddd-demo/actions/workflows/run-tests.yml)

This package provides a **simple artisan command for Laravel** that can **fully scaffold** your application and **jumpstart development**.

**It basically runs the installation process for all of your favourite packages, so that you can start developing right away!**

**[⚡️ Check out the release article and subscribe to my newsletter for updates](https://ralphjsmit.com/laravel-tall-install/)**

## Demo projects

👉 **[Check out a demo-project file's structure](https://github.com/ralphjsmit/tall-install-demo)**

👉 **[Check out a demo-project with an automatically generated Domain-Driven file structure](https://github.com/ralphjsmit/tall-install-ddd-demo)**

## Features

1. It runs the regular installation process for your favourite TALL-tools, so that you don't have to 🚀
2. Install Pest instead of PHPUnit ⚙️
3. Configure a Domain-Driven file structure (DDD)✨
4. Install Browsersync for Valet users ⚡️

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

## Contents

1. [Installation & usage](#installation--usage)
2. [Configure DDD](#configure-ddd-with-tall-install---ddd)
3. [Install Pest](#install-pest-with-tall-install---pest)
4. [Install Browsersync](#install-browsersync-with-tall-install---browsersync)

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

# Run this to reindex potential changes in classes.
composer dump-autoload
```

You can use the following flags to install a particular package.

> Note: you can only use this command on a plain Laravel installation. Otherwise I cannot guarantee the correct result.

## Configure DDD with `tall-install --ddd`

You may use the `--ddd` or `-d` flag to configure DDD:

```bash
php artisan tall-install --ddd
```

I think this is the most powerful feature, as it rewrites your `/app` directory to this:

```
src/Support
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

## Install Browsersync with `tall-install --browsersync`

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

### Cleaning up

You can remove the package from your Composer dependnecies after you've run the `tall-install` command:

```bash
composer remove ralphjsmit/tall-install
```

## General

🐞 If you spot a bug, please submit a detailed issue and I'll try to fix it as soon as possible.

🔐 If you discover a vulnerability, please review [our security policy](../../security/policy).

🙌 If you want to contribute, please submit a pull request. All PRs will be fully credited. If you're unsure whether I'd accept your idea, feel free to contact me!

🙋‍♂️ [Ralph J. Smit](https://ralphjsmit.com)
