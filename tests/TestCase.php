<?php

namespace Revolution\Google\Photos\Tests;

use Revolution\Google\Photos\Providers\PhotosServiceProvider;
use Revolution\Google\Photos\Facades\Photos;

use PulkitJalan\Google\GoogleServiceProvider;
use PulkitJalan\Google\Facades\Google;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            PhotosServiceProvider::class,
            GoogleServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Photos' => Photos::class,
            'Google' => Google::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }
}
