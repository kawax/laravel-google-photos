<?php

namespace Revolution\Google\Photos\Facades;

use Illuminate\Support\Facades\Facade;

use Revolution\Google\Photos\PhotosInterface;

class Photos extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PhotosInterface::class;
    }
}
