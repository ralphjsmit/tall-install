<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

use RalphJSmit\TallInstall\Actions\Filesystem\CopyAction;

class ConfigureBootstrapAction
{
    public function __construct(
        private CopyAction $copyAction,
    ) {}

    public function execute(string $basePath): void
    {
        $this->copyAction->execute(stub('src/Support/App/Application.php'), $basePath . '/src/Support/App/Application.php', true);
        $this->copyAction->execute(stub('bootstrap/app.php'), $basePath . '/bootstrap/app.php', true);
    }
}