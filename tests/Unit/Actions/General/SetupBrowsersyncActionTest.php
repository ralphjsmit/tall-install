<?php

use RalphJSmit\TallInstall\Actions\General\SetupBrowsersyncAction;

beforeEach(function () {
    $this->prefix = __DIR__ . '/../../../tmp/laravel-8.x-tall';
});

it('can setup browsersync', function () {
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('laravel-8.x-tall');

    app(SetupBrowsersyncAction::class)->execute($this->prefix);

    expect($this->prefix . '/webpack.mix.js')->contents->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->toContain("const domain = 'laravel-8.x-tall.test'");
});

it('can setup Browsersync for an url with a slash at the end', function () {
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('laravel-8.x-tall');

    app(SetupBrowsersyncAction::class)->execute($this->prefix . '/');

    expect($this->prefix . '/webpack.mix.js')->contents->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->toContain("const domain = 'laravel-8.x-tall.test'");
});

it('can setup Browsersync with a custom url', function () {
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('laravel-8.x-tall');

    app(SetupBrowsersyncAction::class)->execute($this->prefix, 'tall.test');

    expect($this->prefix . '/webpack.mix.js')->contents->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('laravel-8.x-tall');
    expect($this->prefix . '/webpack.mix.js')->contents->toContain("const domain = 'tall.test'");
});

it('can setup Browsersync with a custom url without .test', function () {
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('laravel-8.x-tall');

    app(SetupBrowsersyncAction::class)->execute($this->prefix, 'tall');

    expect($this->prefix . '/webpack.mix.js')->contents->toContain('mix.browserSync');
    expect($this->prefix . '/webpack.mix.js')->contents->not->toContain('laravel-8.x-tall');
    expect($this->prefix . '/webpack.mix.js')->contents->toContain("const domain = 'tall.test'");
});