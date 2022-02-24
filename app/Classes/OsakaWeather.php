<?php

namespace App\Classes;

use App\Contracts\WeatherForcaster;

class OsakaWeather extends Weather
{
    const CITY = 'osaka';
    
    public function forcast()
    {
      dd(self::CITY);
    }
}