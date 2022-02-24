<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Classes\Weather;

class WeatherController extends Controller
{
    public function weatherForcast($city)
    {   
        $cities = [
            'tokyo',
            'yokohama',
            'kyoto',
            'osaka',
            'sapporo',
            'nagoya',
        ];

        if (in_array(strtolower($city), $cities)) {
            return Weather::forcast($city);
        }

        return [];
    }
}
