<?php

namespace Revolution\Google\Photos\Facades;

use Illuminate\Support\Facades\Facade;
use Revolution\Google\Photos\PickerClient;

/**
 * @method static static withToken(string|array $token)
 *
 * @mixin PickerClient
 */
class Picker extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return PickerClient::class;
    }
}
