<?php

namespace RalphJSmit\TallInstall\Actions\Filesystem;

class CreateFileAction
{
    public function execute(string $path): void
    {
        touch($path);
    }
}
