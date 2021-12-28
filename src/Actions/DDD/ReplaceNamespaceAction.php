<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

use Illuminate\Support\Str;
use RalphJSmit\TallInstall\Actions\Filesystem\FileGetContentsAction;
use RalphJSmit\TallInstall\Actions\Filesystem\FilePutContentsAction;

class ReplaceNamespaceAction
{
    public function __construct(
        private FileGetContentsAction $fileGetContentsAction,
        private FilePutContentsAction $filePutContentsAction,
    ) {
    }

    public function execute(string $basePath, $files): void
    {
        collect($files)->each(function (array $file) use ($basePath): void {
            $this->filePutContentsAction->execute(
                $basePath . $file['path'],
                Str::replace($file['search'], $file['replace'], $this->fileGetContentsAction->execute($basePath . $file['path']))
            );
        });
    }
}
