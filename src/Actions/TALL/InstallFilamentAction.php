<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Composer\ComposerInstallAction;

class InstallFilamentAction
{
    public function __construct(
        private ComposerInstallAction $composerInstallAction,
    ) {}

    public function execute(string $basePath)
    {
        $this->composerInstallAction->execute(['filament/tables:^2.0'], $basePath);
    }
}