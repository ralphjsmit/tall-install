<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Composer\ComposerInstallAction;

class InstallToastAction
{
    public function __construct(
        private ComposerInstallAction $composerInstallAction,
    ) {}

    public function execute(string $basePath)
    {
        $this->composerInstallAction->execute(['usernotnull/tall-toasts'], $basePath);
    }
}
