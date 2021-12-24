<?php

namespace RalphJSmit\TallInstall\Actions\General;

class InstallTodoAction
{
    public function execute(string $basePath): void
    {
        touch($basePath . '/todo');
    }
}
