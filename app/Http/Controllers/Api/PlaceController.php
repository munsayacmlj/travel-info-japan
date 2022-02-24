<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Place;

class PlaceController extends Controller
{
    public function search($lat, $lon)
    {
        $place_details = Place::search($lat, $lon);

        return $place_details;
    }
}
