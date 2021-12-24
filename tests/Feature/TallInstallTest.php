<?php

use RalphJSmit\TallInstall\Actions\TallInstallAction;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../tmp/laravel';
});

it('can install the TALL-stack into any project', function () {
    expect($this->prefix . '/package.json')->contents->not->toContain('"alpinejs":');
    expect($this->prefix . '/package.json')->contents->not->toContain('"@alpinejs/trap":');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"filament/tables":');
    expect($this->prefix . '/tailwind.config.js')->not->toExist();
    expect($this->prefix . '/composer.json')->contents->not->toContain('"livewire/livewire":');
    expect($this->prefix . '/composer.json')->contents->not->toContain('"usernotnull/tall-toasts":');
    expect($this->prefix . '/tailwind.config.js')->not->toExist();

    app(TallInstallAction::class)->execute($this->prefix);

    expect($this->prefix . '/package.json')->contents->toContain('"alpinejs":');
    expect($this->prefix . '/package.json')->contents->toContain('"@alpinejs/trap":');
    expect($this->prefix . '/composer.json')->contents->toContain('"filament/tables":');
    expect($this->prefix . '/tailwind.config.js')->toExist();
    expect($this->prefix . '/composer.json')->contents->toContain('"livewire/livewire":');
    expect($this->prefix . '/composer.json')->contents->toContain('"usernotnull/tall-toasts":');
});
