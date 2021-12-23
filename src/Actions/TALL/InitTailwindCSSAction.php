<?php

namespace RalphJSmit\TallInstall\Actions\TALL;

class InitTailwindCSSAction
{
    public function execute(string $basePath): void
    {
        copy(stub('tailwind.config.js'), $basePath . '/tailwind.config.js');
    }
}