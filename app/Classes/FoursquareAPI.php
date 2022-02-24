<?php

namespace App\Classes;

use GuzzleHttp\Client;

class FoursquareAPI
{
  public static function request(String $url)
  {
    $client = new Client();

    $response = $client->request('GET', $url, [
      'headers' => [
        'Accept' => 'application/json',
        'Authorization' => config('services.foursquare.key'),
      ],
    ]);

    return json_decode($response->getBody());
  }
}