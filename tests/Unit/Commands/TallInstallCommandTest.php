<?php

use function Pest\Laravel\artisan;
use RalphJSmit\TallInstall\Actions\General\SetupBrowsersyncAction;

use RalphJSmit\TallInstall\Actions\TallInstallAction;

it('can install', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null, )
    );

    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->shouldReceive('execute')->never()
    );

    artisan('tall-install');
});

it('can install BrowserSync with --browsersync flag', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null)
    );
    app()->instance(
        SetupBrowsersyncAction::class,
        mock(SetupBrowsersyncAction::class)->expect(execute: fn () => null)
    );

    artisan('tall-install --browsersync');
});

it('can install BrowserSync with -b flag', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null)
    );
    app()->instance(
        SetupBrowsersyncAction::class,
        mock(SetupBrowsersyncAction::class)->expect(execute: fn () => null)
    );
    artisan('tall-install -b');
});
