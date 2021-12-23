<?php

use RalphJSmit\TallInstall\Actions\TallInstallAction;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../tmp/laravel';
});

it('can install the TALL-stack into any project', function () {
    $path = __DIR__ . '/../tmp/laravel';

    app(TallInstallAction::class)->execute($path);

    // composer assertion
    // alpine assertion (npm)
    // filament assertion (composer)
    expect($this->prefix . '/tailwind.config.js')->toExist();
    //    expect($this->prefix . '/resources/css/app.css')->toHaveContents('');
});
