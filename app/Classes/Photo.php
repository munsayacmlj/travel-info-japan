<?php

namespace App\Classes;

use GuzzleHttp\Client;
use App\Classes\FoursquareAPI;

class Photo extends FoursquareAPI
{
  
  public static function search(String $fsq_id)
  {
    $url = "https://api.foursquare.com/v3/places/{$fsq_id}/photos";
    $response_body = FoursquareAPI::request($url);

    return $response_body;
  }
}