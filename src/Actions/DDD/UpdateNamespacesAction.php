<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

use Illuminate\Support\Arr;
use RalphJSmit\TallInstall\Actions\Filesystem\FileGetContentsAction;
use RalphJSmit\TallInstall\Actions\Filesystem\FilePutContentsAction;

class UpdateNamespacesAction
{
    public function __construct(
        private FileGetContentsAction $fileGetContentsAction,
        private FilePutContentsAction $filePutContentsAction,
    ) {
    }

    public function execute(string $basePath)
    {
        $composer = json_decode($this->fileGetContentsAction->execute($basePath . '/composer.json'), true);

        $composer['autoload']['psr-4'] = collect([
            'App\\' => 'src/App/',
            'Domain\\' => 'src/Domain/',
            'Support\\' => 'src/Support/',
        ])->merge(
            Arr::except($composer['autoload']['psr-4'], 'App\\')
        )->toArray();

        $composer['autoload']['files'] = [
            'src/Support/helpers.php',
        ];

        $this->filePutContentsAction->execute(
            $basePath . '/composer.json',
            json_encode((array) $composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );
    }
}
