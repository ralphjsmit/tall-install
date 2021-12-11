<?php

namespace RalphJSmit\TallInstall;

use RalphJSmit\TallInstall\Commands\TallInstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TallInstallServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        if (true) {
            echo '';
        }
        $package
            ->name('tall-install')
            ->hasCommand(TallInstallCommand::class);
    }
}
