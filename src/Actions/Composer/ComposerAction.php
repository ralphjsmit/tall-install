<?php

namespace RalphJSmit\TallInstall\Actions\Composer;

use RalphJSmit\TallInstall\Exceptions\ComposerCommandFailedException;
use Symfony\Component\Process\Process;

class ComposerAction
{
    public function execute(array $arguments, string $basepath): void
    {
        $process = new Process(
            array_merge(['composer'], $arguments),
            $basepath,
        );

        $process->setTimeout(240);
        
        $process->run();

        if ( ! $process->isSuccessful() ) {
            throw new ComposerCommandFailedException($process);
        }

        unlink($basepath . '/composer.lock');
    }
}
