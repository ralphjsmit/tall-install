<?php

namespace RalphJSmit\TallInstall\Facades;

use Illuminate\Support\Facades\Facade;

class TallInstall extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tall-install';
    }
}
