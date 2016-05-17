<?php
namespace Mojopollo\BingScraper;

use Illuminate\Support\ServiceProvider;

class ImageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('bingimagescraper', function () {
            return new Image;
        });
    }

    /**
    * Get the services provided by the provider.
    *
    * @return arr
    */
    public function provides()
    {
        return ['bingimagescraper'];
    }
}
