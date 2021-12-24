<?php

use RalphJSmit\TallInstall\Actions\TallInstallAction;
use RalphJSmit\TallInstall\Actions\Valet\SetupBrowsersyncAction;

use function Pest\Laravel\artisan;

it('can install', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null,)
    );

    artisan('tall-install');
});

it('can install on valet', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null)
    );
    app()->instance(
        SetupBrowsersyncAction::class,
        mock(SetupBrowsersyncAction::class)->expect(execute: fn () => null)
    );
    artisan('tall-install --valet');
});