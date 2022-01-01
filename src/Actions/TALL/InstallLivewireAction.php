<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Composer\ComposerInstallAction;
use RalphJSmit\TallInstall\Exceptions\LivewireCommandFailedException;
use Symfony\Component\Process\Process;

class InstallLivewireAction
{
    public function __construct(
        private ComposerInstallAction $composerInstallAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $this->composerInstallAction->execute(['livewire/livewire'], $basePath);

        $process = new Process(['php', 'artisan, livewire:publish', '--config'], $basePath, );
        $process->run();

        if (! $process->isSuccessful()) {
            throw new LivewireCommandFailedException($process);
        }
    }
}
