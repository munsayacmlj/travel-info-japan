<?php

namespace App\Classes;

use App\Classes\FoursquareAPI;

class Place extends FoursquareAPI
{
  public static function search(float $lat, float $lon)
  {
    $url = "https://api.foursquare.com/v3/places/search?ll={$lat}%2C{$lon}";
    $response_body = FoursquareAPI::request($url);

    return $response_body;
  }
}