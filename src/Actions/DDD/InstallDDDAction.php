<?php

namespace RalphJSmit\TallInstall\Actions\DDD;

class InstallDDDAction
{
    public function __construct(
        private UpdateNamespacesAction $updateNamespacesAction,
        private UpdateFileStructureAction $updateFileStructureAction,
        private ConfigureBootstrapAction $configureBootstrapAction,
        private ReplaceNamespacesAction $replaceNamespacesAction,
    ) {}

    public function execute(string $basePath)
    {
        $this->updateNamespacesAction->execute($basePath);
        $this->updateFileStructureAction->execute($basePath);
        $this->configureBootstrapAction->execute($basePath);
        $this->replaceNamespacesAction->execute($basePath);
    }
}
