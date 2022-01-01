<?php

namespace RalphJSmit\TallInstall\Exceptions;

use Exception;
use Symfony\Component\Process\Process;

class ProcessException extends Exception
{
    public function __construct(
        Process $process,
    ) {
        dump($process->getErrorOutput());
        $this->message = $process->getErrorOutput();
    }
}
