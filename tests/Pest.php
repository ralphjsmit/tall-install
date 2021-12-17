<?php

use RalphJSmit\TallInstall\Tests\TestCase;

use function RalphJSmit\PestPluginFilesystem\rmdir_recursive;

uses(TestCase::class)
    ->beforeEach(function () {
        if ( file_exists(__DIR__ . '/tmp') ) {
            rmdir_recursive(__DIR__ . '/tmp');
        }

        mkdir(__DIR__ . '/tmp', 0777, true);

        prepareEnvironment();
    })->in(__DIR__);

function prepareEnvironment()
{
    if ( file_exists(__DIR__ . '/testing') ) {
        rmdir_recursive(__DIR__ . '/testing');
    }

    mkdir('/testing', 0777, true);
    //    ( new Process(['cd']) )->run();
}
