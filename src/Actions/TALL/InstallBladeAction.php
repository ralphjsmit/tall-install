<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use Illuminate\Support\Str;
use RalphJSmit\TallInstall\Actions\Filesystem\CopyAction;
use RalphJSmit\TallInstall\Actions\Filesystem\FileGetContentsAction;
use RalphJSmit\TallInstall\Actions\Filesystem\FilePutContentsAction;

class InstallBladeAction
{
    public function __construct(
        private CopyAction $copyAction,
        private FileGetContentsAction $fileGetContentsAction,
        private FilePutContentsAction $filePutContentsAction,
    ) {}

    public function execute(string $basePath): void
    {
        $this->copyAction->execute(stub('resources/views/layouts/app.blade.php'), $basePath . '/resources/views/layouts/app.blade.php');
        $this->copyAction->execute(stub('resources/views/layouts/admin.blade.php'), $basePath . '/resources/views/layouts/admin.blade.php');
        $this->copyAction->execute(stub('resources/views/admin/layouts/header.blade.php'), $basePath . '/resources/views/admin/layouts/header.blade.php');
        $this->copyAction->execute(stub('resources/views/components/livewire/spinner-sm.blade.php'), $basePath . '/resources/views/components/livewire/spinner-sm.blade.php');
        $this->copyAction->execute(stub('app/View/Components/Layouts/App.php'), $basePath . '/app/View/Components/Layouts/App.php');
        $this->copyAction->execute(stub('app/View/Components/Layouts/Admin.php'), $basePath . '/app/View/Components/Layouts/Admin.php');
        $this->copyAction->execute(stub('app/Providers/BladeServiceProvider.php'), $basePath . '/app/Providers/BladeServiceProvider.php');

        $contents = $this->fileGetContentsAction->execute($basePath . '/config/app.php');

        $contents = Str::replace("App\Providers\AuthServiceProvider::class,\n", "App\Providers\AuthServiceProvider::class,\n        App\Providers\BladeServiceProvider::class,\n", $contents);

        $this->filePutContentsAction->execute($basePath . '/config/app.php', $contents);
    }
}
