<?php

namespace RalphJSmit\TallInstall\Commands;

use Illuminate\Console\Command;
use RalphJSmit\TallInstall\Actions\General\SetupBrowsersyncAction;
use RalphJSmit\TallInstall\Actions\TallInstallAction;

class TallInstallCommand extends Command
{
    public $signature = 'tall-install
                        {--b|browsersync : Whether to install Browsersync.}';

    public $description = 'Install the TALL-preset for Laravel.';

    public function handle(
        TallInstallAction $tallInstallAction,
        SetupBrowsersyncAction $setupBrowsersyncAction,
    ): int {
        $basePath = base_path();

        $tallInstallAction->execute($basePath);

        if ($this->option('browsersync')) {
            $setupBrowsersyncAction->execute($basePath);
        }

        return self::SUCCESS;
    }
}
