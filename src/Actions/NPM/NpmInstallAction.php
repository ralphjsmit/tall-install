<?php

namespace RalphJSmit\TallInstall\Actions\NPM;

class NpmInstallAction
{
    public function __construct(
        private NpmAction $npmAction,
    ) {}

    public function execute(array $arguments, string $basepath): void
    {
        $this->npmAction->execute(
            array_merge(['install'], $arguments),
            $basepath
        );
    }
}
