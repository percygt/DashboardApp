<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      URL::forceScheme('https');
      if (env('APP_ENV') === 'production') {
        $this->app['request']->server->set('HTTPS','on'); // this line

        URL::forceSchema('https');
    }
    }
}