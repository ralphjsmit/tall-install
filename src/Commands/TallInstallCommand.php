<?php

namespace RalphJSmit\TallInstall\Commands;

use Illuminate\Console\Command;
use RalphJSmit\TallInstall\Actions\DDD\InstallDDDAction;
use RalphJSmit\TallInstall\Actions\General\InstallPestAction;
use RalphJSmit\TallInstall\Actions\General\SetupBrowsersyncAction;
use RalphJSmit\TallInstall\Actions\TallInstallAction;
use RalphJSmit\TallInstall\Commands\Concerns\PingableCommand;
use RalphJSmit\TallInstall\Commands\Interfaces\Pingable;

class TallInstallCommand extends Command implements Pingable
{
    use PingableCommand;

    public $signature = 'tall-install
                        {--b|browsersync : Whether to install Browsersync.}
                        {--url= : Define a different url to be used for Browsersync.}
                        {--p|pest : Whether to install Pest.}
                        {--d|ddd : Whether to configure a domain driven folder structure (DDD).}
                        ';

    public $description = 'Install the TALL-preset for Laravel.';

    public function handle(
        TallInstallAction $tallInstallAction,
        SetupBrowsersyncAction $setupBrowsersyncAction,
        InstallPestAction $installPestAction,
        InstallDDDAction $installDDDAction,
    ): int {
        $browsersync = $this->option('browsersync') || $this->confirm('Do you want to install Browsersync?', true);
        $pest = $this->option('pest') || $this->confirm('Do you want to install Pest?', true);
        $ddd = $this->option('ddd') || $this->confirm('Do you want to configure DDD?', true);

        $basePath = base_path();

        $this->ping('Preparing installation');
        $tallInstallAction->pingable($this)->execute($basePath);

        if ( $browsersync ) {
            $this->ping('Installing Browsersync');
            $setupBrowsersyncAction->execute($basePath, $this->option('url'));
        }

        if ( $pest ) {
            $this->ping('Installing Pest');
            $installPestAction->execute($basePath);
        }

        if ( $ddd ) {
            $this->ping('Installing DDD');
            $installDDDAction->execute($basePath);
        }

        $this->ping('Installation successfull!');

        return self::SUCCESS;
    }
}
