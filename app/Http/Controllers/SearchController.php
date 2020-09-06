<?php

namespace App\Http\Controllers;

use App\GetGeography;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $geog = new GetGeography();
        $address = $geog->getLatLng($request->postcode);
        $lat = $address->response->geometry->location->lat;
        $lng = $address->response->geometry->location->lng;





        return view('search/serps');

    }
}
