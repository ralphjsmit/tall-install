<?php

namespace RalphJSmit\TallInstall\Commands\Concerns;

trait PingableCommand
{
    public function ping(string $text): void
    {
        $this->info($text);
    }
}