<?php

namespace RalphJSmit\TallInstall\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RalphJSmit\TallInstall\TallInstallServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            TallInstallServiceProvider::class,
        ];
    }
}
