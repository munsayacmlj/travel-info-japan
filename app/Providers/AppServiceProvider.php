<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $classes = [
            'tokyo',
            'osaka',
        ];

        foreach ($classes as $class) {
            $city_name = ucfirst($class);
            $this->app->bind("App\Contracts\WeatherForcaster", "App\Classes\\{$city_name}Weather");
        }
    
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
