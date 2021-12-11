<?php

namespace RalphJSmit\TallInstall\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RalphJSmit\TallInstall\TallInstall
 */
class TallInstall extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tall-install';
    }
}
