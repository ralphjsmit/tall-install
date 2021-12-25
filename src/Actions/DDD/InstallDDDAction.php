<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

use RalphJSmit\TallInstall\Actions\Composer\ComposerAction;
use RalphJSmit\TallInstall\Actions\Filesystem\FileGetContentsAction;
use RalphJSmit\TallInstall\Actions\Filesystem\FilePutContentsAction;

class InstallDDDAction
{
    public function __construct(
        private ComposerAction $composerAction,
        private FileGetContentsAction $fileGetContentsAction,
        private FilePutContentsAction $filePutContentsAction,
    ) {
    }

    public function execute(string $basePath)
    {
        $composer = json_decode($this->fileGetContentsAction->execute($basePath . '/composer.json'), true);

        $composer['autoload']['psr-4']['App\\'] = 'src/App/';
        $composer['autoload']['psr-4']['Domain\\'] = 'src/Domain/';
        $composer['autoload']['psr-4']['Support\\'] = 'src/Support/';
        $composer['autoload']['files'][0] = 'src/Support/helpers.php';

        $this->filePutContentsAction->execute($basePath . '/composer.json', json_encode((array) $composer, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }
}
