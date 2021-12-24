<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Filesystem\CopyAction;

class InstallAssetsAction
{
    public function __construct(
        private CopyAction $copyAction,
    ) {}

    public function execute(string $basePath): void
    {
        $this->copyAction->execute(stub('resources/css/app.css'), $basePath . '/resources/css/app.css', true);
        $this->copyAction->execute(stub('resources/css/defaults.css'), $basePath . '/resources/css/defaults.css');
        $this->copyAction->execute(stub('resources/css/pages.css'), $basePath . '/resources/css/pages.css');
        $this->copyAction->execute(stub('resources/js/app.js'), $basePath . '/resources/js/app.js');
        unlink($basePath . '/resources/js/bootstrap.js');
        $this->copyAction->execute(stub('webpack.mix.js'), $basePath . '/webpack.mix.js');
    }
}
