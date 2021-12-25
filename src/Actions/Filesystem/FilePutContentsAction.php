<?php

namespace RalphJSmit\TallInstall\Actions\Filesystem;

class FilePutContentsAction
{
    public function execute(string $path, string $contents): string
    {
        return file_put_contents($path, $contents);
    }
}
