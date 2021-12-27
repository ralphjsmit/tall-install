<?php

use RalphJSmit\TallInstall\Actions\DDD\InstallDDDAction;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../../../tmp/laravel-8.x-tall';
});

it('it can configure DDD for an application', function () {
    expect($this->prefix . '/src')->not->toExist();
    expect($this->prefix . '/composer.json')->contents->not->toContain('"App\\": "src/App/",');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"Domain\\": "src/Domain/",');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"Support\\": "src/Support/",');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"src/Support/helpers.php"');
    expect($this->prefix . '/app/Console/Kernel.php')->toHaveNamespace('App\Console');
    expect($this->prefix . '/app/Exceptions/Handler.php')->toHaveNamespace('App\Exceptions');
    expect($this->prefix . '/app/Http/Controllers/Controller.php')->toHaveNamespace('App\Http\Controllers');
    expect($this->prefix . '/app/Http/Kernel.php')->toHaveNamespace('App\Http');
    expect($this->prefix . '/app/Http/Middleware/Authenticate.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/EncryptCookies.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/PreventRequestsDuringMaintenance.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/RedirectIfAuthenticated.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/TrimStrings.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/TrustHosts.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/TrustProxies.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Http/Middleware/VerifyCsrfToken.php')->toHaveNamespace('App\Http\Middleware');
    expect($this->prefix . '/app/Providers/AppServiceProvider.php')->toHaveNamespace('App\Providers');
    expect($this->prefix . '/app/Providers/AuthServiceProvider.php')->toHaveNamespace('App\Providers');
    expect($this->prefix . '/app/Providers/BladeServiceProvider.php')->toHaveNamespace('App\Providers');
    expect($this->prefix . '/app/Providers/BroadcastServiceProvider.php')->toHaveNamespace('App\Providers');
    expect($this->prefix . '/app/Providers/EventServiceProvider.php')->toHaveNamespace('App\Providers');
    expect($this->prefix . '/app/Providers/RouteServiceProvider.php')->toHaveNamespace('App\Providers');
    expect($this->prefix . '/app/Models/User.php')->toHaveNamespace('App\Models');
    expect($this->prefix . '/app/View/Components/Layouts/Admin.php')->toHaveNamespace('App\View\Components\Layouts');
    expect($this->prefix . '/app/View/Components/Layouts/App.php')->toHaveNamespace('App\View\Components\Layouts');
    expect($this->prefix . '/bootstrap/app.php')->contents->not->toContain(
        'new Support\App\Application(',
        'Support\App\Http\Kernel::class',
        'Support\App\Console\Kernel::class',
        'Support\App\Exceptions\Handler::class'
    );
    expect($this->prefix . '/config/app.php')
        ->contents->toContain('App\Providers')
        ->not->toContain('Support\App\Providers');
    expect($this->prefix . '/database/seeders/DatabaseSeeder.php')->contents->not->toContain('Support\Models');

    app(InstallDDDAction::class)->execute($this->prefix);

    expect($this->prefix . '/composer.json')->contents->toContain('"App\\\": "src/App/"');
    expect($this->prefix . '/composer.json')->contents->toContain('"Domain\\\": "src/Domain/"');
    expect($this->prefix . '/composer.json')->contents->toContain('"Support\\\": "src/Support/"');
    expect($this->prefix . '/composer.json')->contents->toContain('"src/Support/helpers.php"');

    expect($this->prefix . '/src/Support/App/Console/Kernel.php')->toHaveNamespace('Support\App\Console');
    expect($this->prefix . '/src/Support/App/Exceptions/Handler.php')->toHaveNamespace('Support\App\Exceptions');
    expect($this->prefix . '/src/Support/App/Http/Controllers/Controller.php')->toHaveNamespace('Support\App\Http\Controllers');
    expect($this->prefix . '/src/Support/App/Http/Kernel.php')->toHaveNamespace('Support\App\Http');
    expect($this->prefix . '/src/Support/App/Http/Middleware/Authenticate.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/EncryptCookies.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/PreventRequestsDuringMaintenance.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/RedirectIfAuthenticated.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/TrimStrings.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/TrustHosts.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/TrustProxies.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Http/Middleware/VerifyCsrfToken.php')->toHaveNamespace('Support\App\Http\Middleware');
    expect($this->prefix . '/src/Support/App/Providers/AppServiceProvider.php')->toHaveNamespace('Support\App\Providers');
    expect($this->prefix . '/src/Support/App/Providers/AuthServiceProvider.php')->toHaveNamespace('Support\App\Providers');
    expect($this->prefix . '/src/Support/App/Providers/BladeServiceProvider.php')->toHaveNamespace('Support\App\Providers');
    expect($this->prefix . '/src/Support/App/Providers/BroadcastServiceProvider.php')->toHaveNamespace('Support\App\Providers');
    expect($this->prefix . '/src/Support/App/Providers/EventServiceProvider.php')->toHaveNamespace('Support\App\Providers');
    expect($this->prefix . '/src/Support/App/Providers/RouteServiceProvider.php')->toHaveNamespace('Support\App\Providers');
    expect($this->prefix . '/src/Support/Models/User.php')->toHaveNamespace('Support\Models');
    expect($this->prefix . '/src/Support/View/Components/Layouts/Admin.php')->toHaveNamespace('Support\View\Components\Layouts');
    expect($this->prefix . '/src/Support/View/Components/Layouts/App.php')->toHaveNamespace('Support\View\Components\Layouts');
    expect($this->prefix . '/src/Support/App/Application.php')->toExist()->toHaveNamespace('Support\App');
    expect($this->prefix . '/bootstrap/app.php')->contents->toContain(
        'new Support\App\Application(',
        'Support\App\Http\Kernel::class',
        'Support\App\Console\Kernel::class',
        'Support\App\Exceptions\Handler::class'
    );
    expect($this->prefix . '/config/app.php')->contents->toContain('Support\App\Providers');
    expect($this->prefix . '/database/seeders/DatabaseSeeder.php')->contents->toContain('Support\Models');
    expect($this->prefix . '/src/Support/App/Http/Kernel.php')->contents->toContain('Support\App');
    expect($this->prefix . '/src/Support/App/Providers/AuthServiceProvider.php')->contents->toContain('Support\App');
});
