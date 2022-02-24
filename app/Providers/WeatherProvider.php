<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WeatherProvider extends ServiceProvider
{
  public function boot() {}

  public function register()
  {
    $this->app->bind("App\Contracts\WeatherForcaster", "App\Classes\TokyoWeather");
  }
}