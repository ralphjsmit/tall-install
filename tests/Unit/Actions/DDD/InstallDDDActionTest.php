<?php

use RalphJSmit\TallInstall\Actions\DDD\InstallDDDAction;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../../../tmp/laravel-8.x-tall';
});

it('it can configure DDD for an application', function () {
    expect($this->prefix . '/src')->not->toExist();
    expect($this->prefix . '/composer.json')->contents->not->toContain('"App\\": "src/App/",');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"Domain\\": "src/Domain/",');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"Support\\": "src/Support/",');

    app(InstallDDDAction::class)->execute($this->prefix);

    expect($this->prefix . '/composer.json')->contents->toContain('"App\\\": "src/App/"');
    expect($this->prefix . '/composer.json')->contents->toContain('"Domain\\\": "src/Domain/"');
    expect($this->prefix . '/composer.json')->contents->toContain('"Support\\\": "src/Support/"');
    expect($this->prefix . '/composer.json')->contents->toContain('"src/Support/helpers.php"');
});
