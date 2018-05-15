<?php

namespace Revolution\Google\Photos\Providers;

use Illuminate\Support\ServiceProvider;

use Revolution\Google\Photos\Photos;
use Revolution\Google\Photos\Contracts\Photos as PhotosContract;

class PhotosServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PhotosContract::class, function ($app) {
            return new Photos();
        });

        $this->app->alias(
            Photos::class, PhotosContract::class
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [PhotosContract::class];
    }
}
