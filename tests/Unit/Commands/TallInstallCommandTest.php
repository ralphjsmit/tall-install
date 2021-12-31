<?php

use Mockery\MockInterface;
use function Pest\Laravel\artisan;
use RalphJSmit\TallInstall\Actions\DDD\InstallDDDAction;
use RalphJSmit\TallInstall\Actions\General\InstallPestAction;
use RalphJSmit\TallInstall\Actions\General\SetupBrowsersyncAction;

use RalphJSmit\TallInstall\Actions\TallInstallAction;

it('can install', function () {
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });

    artisan('tall-install');
});

it('can install BrowserSync with --browsersync flag', function () {
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });
    app()->instance(
        SetupBrowsersyncAction::class,
        mock(SetupBrowsersyncAction::class)->expect(execute: fn () => null)
    );

    artisan('tall-install --browsersync');
});

it('can install BrowserSync with -b flag', function () {
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });
    app()->instance(
        SetupBrowsersyncAction::class,
        mock(SetupBrowsersyncAction::class)->expect(execute: fn () => null)
    );
    artisan('tall-install -b');
});

it('can install BrowserSync with a custom url', function () {
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });

    $this->mock(SetupBrowsersyncAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->with(base_path(), 'mydomain');
    });

    artisan('tall-install -b --url=mydomain');
});

it('can install Pest with --pest flag', function () {
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });

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
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });

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
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });

    $mocks = [
        SetupBrowsersyncAction::class,
        InstallPestAction::class,
    ];

    foreach ($mocks as $mock) {
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
    $this->mock(TallInstallAction::class, function (MockInterface $mock) {
        $mock
            ->shouldReceive('pingable')->once()->andReturnSelf()
            ->shouldReceive('execute')->once();
    });

    $mocks = [
        SetupBrowsersyncAction::class,
        InstallPestAction::class,
    ];

    foreach ($mocks as $mock) {
        $this->mock($mock, function (MockInterface $mock) {
            $mock->shouldReceive('execute')->never();
        });
    }

    $this->mock(InstallDDDAction::class, function (MockInterface $mock) {
        $mock->shouldReceive('execute')->once();
    });

    artisan('tall-install -d');
});
