<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\NPM\NpmInstallAction;

class InstallTailwindCSSAction
{
    public function __construct(
        private NpmInstallAction $npmInstallAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $this->npmInstallAction->execute(['-D', 'tailwindcss', 'postcss', 'autoprefixer'], $basePath);
    }
}
