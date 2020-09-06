<?php


namespace App;


use Jcf\Geocode\Geocode;

class GetGeography
{
    public function getLatLng($postcode)
    {
        $postcode = str_replace(' ', '', $postcode);
        $postcode = strtoupper($postcode);

        $geography = Geocode::make()->address($postcode);

        return $geography;

    }

}