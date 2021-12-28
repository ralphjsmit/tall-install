<?php

use Mockery\MockInterface;
use RalphJSmit\TallInstall\Actions\DDD\InstallDDDAction;
use RalphJSmit\TallInstall\Actions\General\InstallPestAction;
use RalphJSmit\TallInstall\Actions\General\SetupBrowsersyncAction;
use RalphJSmit\TallInstall\Actions\TallInstallAction;

it('can install', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null,)
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

it('can install BrowserSync with a custom url', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null)
    );

    $this->mock(SetupBrowsersyncAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->with(base_path(), 'mydomain');
    });

    artisan('tall-install -b --url=mydomain');
});

it('can install Pest with --pest flag', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null)
    );

    $this->mock(SetupBrowsersyncAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->never();
    });

    app()->instance(
        InstallPestAction::class,
        mock(InstallPestAction::class)->expect(execute: fn () => null)
    );

    artisan('tall-install --pest');
});

it('can install Pest with -p flag', function () {
    app()->instance(
        TallInstallAction::class,
        mock(TallInstallAction::class)->expect(execute: fn () => null)
    );

    $this->mock(SetupBrowsersyncAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->never();
    });

    app()->instance(
        InstallPestAction::class,
        mock(InstallPestAction::class)->expect(execute: fn () => null)
    );

    artisan('tall-install -p');
});

it('can install DDD with --ddd flag', function () {
    foreach (
        [
            TallInstallAction::class,
            SetupBrowsersyncAction::class,
            InstallPestAction::class,
        ] as $mock) {
        $this->mock($mock, function (MockInterface $mock) {
            $mock->shouldReceive('execute')->never();
        });
    }

    $this->mock(InstallDDDAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->once();
    });

    $this->artisan('tall-install --ddd');
});

it('can install DDD with -d flag', function () {
    foreach (
        [
            TallInstallAction::class,
            SetupBrowsersyncAction::class,
            InstallPestAction::class,
        ] as $mock) {
        $this->mock($mock, function (MockInterface $mock) {
            $mock->shouldReceive('execute')->never();
        });
    }

    $this->mock(InstallDDDAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->once();
    });

    artisan('tall-install -d');
});
