<?php
namespace Mojopollo\BingScraper;

use Illuminate\Support\ServiceProvider;

class BingScraperServiceProvider extends ServiceProvider
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
        $this->app->bindShared('bingscraper', function () {
            return new BingScraper;
        });
    }

    /**
    * Get the services provided by the provider.
    *
    * @return arr
    */
    public function provides()
    {
        return ['bingscraper'];
    }
}
