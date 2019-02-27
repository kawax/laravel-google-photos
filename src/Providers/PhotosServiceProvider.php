<?php

namespace Revolution\Google\Photos\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;
use Revolution\Google\Photos\Photos;
use Revolution\Google\Photos\Contracts\Factory;

class PhotosServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Boot the service provider.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new Photos();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [Factory::class];
    }
}
