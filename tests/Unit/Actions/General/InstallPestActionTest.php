<?php

use RalphJSmit\TallInstall\Actions\General\InstallPestAction;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../../../tmp/laravel-8.x-tall';
});

it('can setup pest', function () {
    expect($this->prefix . '/composer.json')->contents->not->toContain('"pestphp/pest":');
    expect($this->prefix . '/tests/Pest.php')->not->toExist();

    app(InstallPestAction::class)->execute($this->prefix);

    expect($this->prefix . '/composer.json')->contents->toContain('"pestphp/pest-plugin-laravel":');
    expect($this->prefix . '/tests/Pest.php')->toExist();
});