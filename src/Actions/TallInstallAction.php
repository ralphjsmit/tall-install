<?php

namespace RalphJSmit\TallInstall\Actions;

use RalphJSmit\TallInstall\Actions\TALL\InitTailwindCSSAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallAlpineAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallFilamentAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallTailwindCSSAction;

class TallInstallAction
{
    public function __construct(
        private InstallAlpineAction $installAlpineAction,
        private InstallFilamentAction $installFilamentAction,
        private InstallTailwindCSSAction $installTailwindCSSAction,
        private InitTailwindCSSAction $initTailwindCSSAction,
    ) {}

    public function execute(string $basePath = null)
    {
        $this->installAlpineAction->execute($basePath);
        $this->installTailwindCSSAction->execute($basePath);
        $this->installFilamentAction->execute($basePath);
        $this->initTailwindCSSAction->execute($basePath);
    }
}