<?php

namespace RalphJSmit\TallInstall\Exceptions;

use Exception;
use Symfony\Component\Process\Process;

class ProcessException extends Exception
{
    public function __construct(
        public Process $process,
    ) {
    }

    public function report()
    {
        return $this->process->getErrorOutput();
    }
}
