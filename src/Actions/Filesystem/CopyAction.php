<?php

namespace RalphJSmit\TallInstall\Actions\Filesystem;

use RalphJSmit\TallInstall\Exceptions\Filesystem\CopyActionFailedException;

class CopyAction
{
    public function execute(string $from, string $to, bool $overwrite = true): void
    {
        if ( $overwrite && file_exists($to) ) {
            unlink($to);
        }

        $result = copy($from, $to);

        if ( ! $result ) {
            throw new CopyActionFailedException("Failed copying file from {$from} to {$to}");
        }
    }
}