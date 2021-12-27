<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

class InstallDDDAction
{
    public function __construct(
        private UpdateNamespacesAction $updateNamespacesAction,
        private UpdateFileStructureAction $updateFileStructureAction,
    ) {
    }

    public function execute(string $basePath)
    {
        $this->updateNamespacesAction->execute($basePath);
        $this->updateFileStructureAction->execute($basePath);
    }
}
