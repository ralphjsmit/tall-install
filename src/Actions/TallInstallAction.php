<?php

namespace RalphJSmit\TallInstall\Actions;

use RalphJSmit\TallInstall\Actions\General\InstallGitignoreAction;
use RalphJSmit\TallInstall\Actions\General\InstallTodoAction;
use RalphJSmit\TallInstall\Actions\TALL\InitTailwindCSSAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallAlpineAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallAssetsAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallBladeAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallFilamentAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallLivewireAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallTailwindCSSAction;
use RalphJSmit\TallInstall\Actions\TALL\InstallToastAction;

class TallInstallAction
{
    public function __construct(
        private InstallAlpineAction $installAlpineAction,
        private InstallFilamentAction $installFilamentAction,
        private InstallTailwindCSSAction $installTailwindCSSAction,
        private InitTailwindCSSAction $initTailwindCSSAction,
        private InstallLivewireAction $installLivewireAction,
        private InstallToastAction $installToastAction,
        private InstallAssetsAction $installAssetsAction,
        private InstallBladeAction $installBladeAction,
        private InstallTodoAction $installTodoAction,
        private InstallGitignoreAction $installGitignoreAction,
    ) {
    }

    public function execute(string $basePath)
    {
        $this->installAlpineAction->execute($basePath);
        $this->installTailwindCSSAction->execute($basePath);
        $this->installFilamentAction->execute($basePath);
        $this->initTailwindCSSAction->execute($basePath);
        $this->installLivewireAction->execute($basePath);
        $this->installToastAction->execute($basePath);
        $this->installAssetsAction->execute($basePath);
        $this->installBladeAction->execute($basePath);
        $this->installTodoAction->execute($basePath);
        $this->installGitignoreAction->execute($basePath);
    }
}
