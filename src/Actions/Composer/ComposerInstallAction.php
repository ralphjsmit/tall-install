<?php

namespace RalphJSmit\TallInstall\Actions\Composer;

class ComposerInstallAction
{
    public function __construct(
        private ComposerAction $composerAction,
    ) {
    }

    public function execute(array $arguments, string $basepath): void
    {
        $this->composerAction->execute(
            array_merge(['require'], $arguments),
            $basepath
        );
    }
}
