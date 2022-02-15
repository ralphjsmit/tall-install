<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\NPM\NpmInstallAction;

class InstallAlpineAction
{
    public function __construct(
        private NpmInstallAction $npmInstallAction,
    ) {}

    public function execute(string $basePath): void
    {
        $this->npmInstallAction->execute(['alpinejs', '@alpinejs/focus', '--save-dev'], $basePath);
    }
}
