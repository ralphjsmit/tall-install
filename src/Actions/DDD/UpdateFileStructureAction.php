<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

use RalphJSmit\Filesystem\Stub;
use RalphJSmit\TallInstall\Actions\Filesystem\CreateFileAction;
use RalphJSmit\TallInstall\Actions\Filesystem\CreateFolderAction;
use RalphJSmit\TallInstall\Actions\Filesystem\DeleteFolderAction;

class UpdateFileStructureAction
{
    public function __construct(
        private CreateFileAction $createFileAction,
        private CreateFolderAction $createFolderAction,
        private DeleteFolderAction $deleteFileAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $stubs = Stub::dir($basePath)->namespaces([
            'Support' => '/src/Support/',
            'Domain' => '/src/Domain/',
            'App' => '/src/App/',
        ]);

        $stubs->getFile('/app/Console/Kernel.php')->namespace('Support\App\Console');
        $stubs->getFile('/app/Exceptions/Handler.php')->namespace('Support\App\Exceptions');
        $stubs->getFile('/app/Http/Controllers/Controller.php')->namespace('Support\App\Http\Controllers');
        $stubs->getFile('/app/Http/Kernel.php')->namespace('Support\App\Http');
        $stubs->getFile('/app/Http/Middleware/Authenticate.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/EncryptCookies.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/PreventRequestsDuringMaintenance.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/RedirectIfAuthenticated.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/TrimStrings.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/TrustHosts.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/TrustProxies.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Http/Middleware/VerifyCsrfToken.php')->namespace('Support\App\Http\Middleware');
        $stubs->getFile('/app/Providers/AppServiceProvider.php')->namespace('Support\App\Providers');
        $stubs->getFile('/app/Providers/AuthServiceProvider.php')->namespace('Support\App\Providers');
        $stubs->getFile('/app/Providers/BladeServiceProvider.php')->namespace('Support\App\Providers');
        $stubs->getFile('/app/Providers/BroadcastServiceProvider.php')->namespace('Support\App\Providers');
        $stubs->getFile('/app/Providers/EventServiceProvider.php')->namespace('Support\App\Providers');
        $stubs->getFile('/app/Providers/RouteServiceProvider.php')->namespace('Support\App\Providers');

        $stubs->getFile('/app/Models/User.php')->namespace('Support\Models');
        $stubs->getFile('/app/View/Components/Layouts/Admin.php')->namespace('Support\View\Components\Layouts');
        $stubs->getFile('/app/View/Components/Layouts/App.php')->namespace('Support\View\Components\Layouts');

        $this->createFileAction->execute($basePath . '/src/Support/helpers.php');
        $this->deleteFileAction->execute($basePath . '/app');

        $this->createFolderAction->execute($basePath . '/src/Domain');
        $this->createFolderAction->execute($basePath . '/src/App/Admin');
        $this->createFolderAction->execute($basePath . '/src/App/Api');
        $this->createFolderAction->execute($basePath . '/src/App/Console');
        $this->createFolderAction->execute($basePath . '/src/App/Jobs');
    }
}
