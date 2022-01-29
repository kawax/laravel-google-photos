<?php

namespace Revolution\Google\Photos\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Revolution\Google\Photos\Contracts\Factory;
use Revolution\Google\Photos\Photos;

class PhotosServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Factory::class, Photos::class);
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
