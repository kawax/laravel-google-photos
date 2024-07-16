<?php

namespace Revolution\Google\Photos\Providers;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Revolution\Google\Photos\Contracts\Factory;
use Revolution\Google\Photos\PhotosClient;

class PhotosServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->singleton(Factory::class, PhotosClient::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [Factory::class];
    }
}
