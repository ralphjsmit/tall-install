<?php

namespace RalphJSmit\TallInstall\Exceptions;

use Exception;
use Symfony\Component\Process\Process;

class ProcessException extends Exception
{
    public function __construct(
        Process $process,
    ) {
        $output = $process->getOutput();
        $errorOutput = $process->getErrorOutput();

        if (! $errorOutput) {
            $errorOutput = $output;
        }

        $this->message = $errorOutput;
    }
}
