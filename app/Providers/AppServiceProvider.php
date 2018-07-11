<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Services\ZAnimes;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setLocale('pt');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\ZAnimesInterface', function ($app) {
            return new ZAnimes();
        });
    }
}
