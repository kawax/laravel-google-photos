<?php

namespace Revolution\Google\Photos\Facades;

use Illuminate\Support\Facades\Facade;
use Revolution\Google\Photos\Contracts\Factory;

class Photos extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return Factory::class;
    }
}
