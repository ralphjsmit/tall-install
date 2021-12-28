<?php

namespace RalphJSmit\TallInstall\Actions\General;

use RalphJSmit\TallInstall\Actions\Composer\ComposerInstallAction;
use RalphJSmit\TallInstall\Exceptions\PestInstallFailedException;
use Symfony\Component\Process\Process;

class InstallPestAction
{
    public function __construct(
        private ComposerInstallAction $composerInstallAction
    ) {}

    public function execute(string $basePath): void
    {
        $this->composerInstallAction->execute(['pestphp/pest-plugin-laravel', '--dev'], $basePath);

        $process = new Process(['php', 'artisan', 'pest:install', '--no-interaction'], $basePath);
        $process->run();

        if ( ! $process->isSuccessful() ) {
            throw new PestInstallFailedException($process);
        }
    }
}
