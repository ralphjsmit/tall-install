<?php

namespace RalphJSmit\TallInstall\Commands;

use Illuminate\Console\Command;
use RalphJSmit\TallInstall\Actions\TallInstallAction;

class TallInstallCommand extends Command
{
    public $signature = 'tall-install';

    public $description = 'Install the TALL-preset for Laravel.';

    public function handle(
        TallInstallAction $tallInstallAction,
    ): int {
        $this->comment('Starting install...');

        $tallInstallAction->execute();

        $this->comment('Installation finished.');

        return self::SUCCESS;
    }
}
