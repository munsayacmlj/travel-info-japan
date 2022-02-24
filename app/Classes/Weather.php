<?php

namespace App\Classes;

use GuzzleHttp\Client;
use App\Classes\Place;
use App\Classes\Photo;

class Weather
{
    /**
     * URI
     */
    const BASE_URI = "https://api.openweathermap.org/data/2.5/forecast";

    /**
     * APP ID for openweathermap API.
     */
    const OPEN_WEATHER_MAP_API_KEY = "64cec784a2b5e819a182a051694158a3";


    public static function forcast(String $city): array
    {
      $client = new Client();
      $url = self::BASE_URI;

      $params = [
          'q' =>    "{$city},jp",
          'appid' =>    self::OPEN_WEATHER_MAP_API_KEY,
          'units' =>    'metric',
      ];

      $response = $client->request('GET', $url, [
          'query'  =>  $params,
      ]);

      $response_body = json_decode($response->getBody());

      $list = $response_body->list;

      $temperature_collection = [];
      $days_collection = [];

      $day = date('d', $list[0]->dt);
      $index = date('D', $list[0]->dt);

      foreach ($list as $temp) {
          $time_readable = date('gA', $temp->dt);
          $temp->time_readable = $time_readable;

          if ($day == date('d', $temp->dt)) {
              $temperature_collection[$index][] = $temp;
          } else {
              $temperature_collection[$index][] = $temp;
          }

          if (!in_array($index, $days_collection)) {
            $days_collection[] = $index;
          }

          $day = date('d', $temp->dt);
          $index = date('D', $temp->dt);

          
      }

      return ['temperature_collection' => $temperature_collection, 
                'days_collection' => $days_collection, 
                'city_details' => $response_body->city,
            ];
    }
}