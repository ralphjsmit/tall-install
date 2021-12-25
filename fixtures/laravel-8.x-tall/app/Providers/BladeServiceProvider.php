<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Blade::component('layouts.app', \App\View\Components\Layouts\App::class);
        Blade::component('layouts.admin', \App\View\Components\Layouts\Admin::class);
    }
}
