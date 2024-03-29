<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Configuration;
use App\Menu;
use App\Pagina;
use View;

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
        View::share('configuration',Configuration::find(1));
    }
}
