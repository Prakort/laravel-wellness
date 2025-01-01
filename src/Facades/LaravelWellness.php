<?php

namespace prakort\LaravelWellness\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \prakort\LaravelWellness\LaravelWellness
 */
class LaravelWellness extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \prakort\LaravelWellness\LaravelWellness::class;
    }
}
