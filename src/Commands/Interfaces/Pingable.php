<?php

namespace RalphJSmit\TallInstall\Commands\Interfaces;

interface Pingable
{
    public function ping(string $text): void;
}
