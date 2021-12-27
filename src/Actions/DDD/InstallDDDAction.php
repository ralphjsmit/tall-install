<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

class InstallDDDAction
{
    public function __construct(
        private UpdateNamespacesAction $updateNamespacesAction,
    ) {
    }

    public function execute(string $basePath)
    {
        $this->updateNamespacesAction->execute($basePath);
    }
}
