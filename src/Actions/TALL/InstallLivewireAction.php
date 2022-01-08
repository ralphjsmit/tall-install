<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

use RalphJSmit\TallInstall\Actions\Composer\ComposerInstallAction;
use RalphJSmit\TallInstall\Actions\DDD\ReplaceNamespaceAction;
use RalphJSmit\TallInstall\Exceptions\LivewireCommandFailedException;
use Symfony\Component\Process\Process;

class InstallLivewireAction
{
    public function __construct(
        private ComposerInstallAction $composerInstallAction,
        private ReplaceNamespaceAction $replaceNamespaceAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $this->composerInstallAction->execute(['livewire/livewire'], $basePath);

        $publishConfigProcess = new Process(['php', 'artisan', 'livewire:publish', '--config'], $basePath);
        $publishConfigProcess->run();

        if (! $publishConfigProcess->isSuccessful()) {
            throw new LivewireCommandFailedException($publishConfigProcess);
        }

        $this->replaceNamespaceAction->execute($basePath, [
            [
                'path' => '/config/livewire.php',
                'search' => "'App\\\Http\\\Livewire'",
                'replace' => "''",
            ],
        ]);

        $livewireDiscoverProcess = new Process(['php', 'artisan', 'livewire:discover'], $basePath);
        $livewireDiscoverProcess->run();

        if (! $livewireDiscoverProcess->isSuccessful()) {
            throw new LivewireCommandFailedException($livewireDiscoverProcess);
        }
    }
}
