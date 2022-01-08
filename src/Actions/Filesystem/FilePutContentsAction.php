<?php

namespace RalphJSmit\TallInstall\Actions\Filesystem;

class FilePutContentsAction
{
    public function execute(string $path, string $contents): string
    {
        dump('Contents', $contents);

        return file_put_contents($path, $contents);
    }
}
