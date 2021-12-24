<?php

namespace RalphJSmit\TallInstall\Actions\General;

use Illuminate\Support\Str;
use RalphJSmit\TallInstall\Actions\Filesystem\FileGetContentsAction;

class InstallGitignoreAction
{
    public function __construct(
        private FileGetContentsAction $fileGetContentsAction,
    ) {
    }

    public function execute(string $basePath): void
    {
        $gitignore = Str::of(
            $this->fileGetContentsAction->execute($basePath . '/.gitignore')
        );

        $gitignore = $gitignore->replace(
            "/vendor\n",
            "/vendor\n/vendor.nosync\n"
        );

        $gitignore = $gitignore->replace(
            "/node_modules\n",
            "/node_modules\n/node_modules.nosync\n"
        );

        dump($gitignore);

        file_put_contents($basePath . "/.gitignore", (string) $gitignore);
    }
}
