<?php

namespace App\Http\Controllers;

use App\GetGeography;
use App\RadiusSearch;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $geog = new GetGeography();
        $address = $geog->getLatLng($request->postcode);
        $lat = $address->response->geometry->location->lat;
        $lng = $address->response->geometry->location->lng;

        $radius = env('SEARCH_RADIUS');
        $results = new RadiusSearch();
        $r = $results->get_meals_near($lat, $lng, $radius);

        dd($r);



        return view('search/serps');

    }
}
