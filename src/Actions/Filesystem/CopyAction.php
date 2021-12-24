<?php

namespace RalphJSmit\TallInstall\Actions\Filesystem;

use Illuminate\Support\Str;
use RalphJSmit\TallInstall\Exceptions\Filesystem\CopyActionFailedException;

class CopyAction
{
    public function __construct(
        private MakeDirectoryAction $makeDirectoryAction,
    ) {}

    public function execute(string $from, string $to, bool $overwrite = true): void
    {
        if ($overwrite && file_exists($to)) {
            unlink($to);
        }

        $directoryForNewFile = Str::beforeLast($to, '/');

        if ( ! file_exists($directoryForNewFile) ) {
            $this->makeDirectoryAction->execute($directoryForNewFile);
        }

        $result = copy($from, $to);

        if (! $result) {
            throw new CopyActionFailedException("Failed copying file from {$from} to {$to}");
        }
    }
}
