<?php

namespace RalphJSmit\TallInstall;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RalphJSmit\TallInstall\Commands\TallInstallCommand;

class TallInstallServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('tall-install')
            ->hasCommand(TallInstallCommand::class);
    }
}
