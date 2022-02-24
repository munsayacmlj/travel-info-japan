<?php

namespace App\Classes;

use GuzzleHttp\Client;

class FoursquareAPI
{
  /**
   * FOURSQUARE API key
   */
  const FOURSQUARE_API_KEY = 'fsq3/rgnHMLsHNozkyCx/4o0KRuPogozyw83FGwVvCYDX2A=';

  public static function request(String $url)
  {
    $client = new Client();

    $response = $client->request('GET', $url, [
      'headers' => [
        'Accept' => 'application/json',
        'Authorization' => self::FOURSQUARE_API_KEY,
      ],
    ]);

    return json_decode($response->getBody());
  }
}