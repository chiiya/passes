<?php

namespace Chiiya\LaravelPasses\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Chiiya\LaravelPasses\LaravelPasses
 */
class LaravelPasses extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-passes';
    }
}
