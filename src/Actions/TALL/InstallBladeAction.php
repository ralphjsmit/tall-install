<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Filesystem\CopyAction;

class InstallBladeAction
{
    public function __construct(
        private CopyAction $copyAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $this->copyAction->execute(stub('resources/views/layouts/app.blade.php'), $basePath . '/resources/views/layouts/app.blade.php');
        $this->copyAction->execute(stub('resources/views/layouts/admin.blade.php'), $basePath . '/resources/views/layouts/admin.blade.php');
        $this->copyAction->execute(stub('resources/views/admin/layouts/header.blade.php'), $basePath . '/resources/views/admin/layouts/header.blade.php');
        $this->copyAction->execute(stub('resources/views/components/livewire/spinner-sm.blade.php'), $basePath . '/resources/views/components/livewire/spinner-sm.blade.php');
        $this->copyAction->execute(stub('app/View/Components/Layouts/App.php'), $basePath . '/app/View/Components/Layouts/App.php');
        $this->copyAction->execute(stub('app/View/Components/Layouts/Admin.php'), $basePath . '/app/View/Components/Layouts/Admin.php');
        $this->copyAction->execute(stub('app/Providers/BladeServiceProvider.php'), $basePath . '/app/Providers/BladeServiceProvider.php');
    }
}
