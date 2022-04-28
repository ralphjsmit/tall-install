<?php

namespace RalphJSmit\TallInstall\Actions\NPM;

use RalphJSmit\TallInstall\Exceptions\NpmCommandFailedException;
use Symfony\Component\Process\Process;

class NpmAction
{
    public function execute(array $arguments, string $basepath): void
    {
        $process = new Process(
            array_merge(['npm'], $arguments),
            $basepath,
        );

        $process->setTimeout(240);

        $process->run();

        if ( ! $process->isSuccessful() ) {
            throw new NpmCommandFailedException($process);
        }

        unlink($basepath . '/package-lock.json');
    }
}
