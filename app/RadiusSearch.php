<?php


namespace App;


class RadiusSearch
{

    public function get_meals_near($latitude, $longitude, $radius){

        $cooks = User::query()->select('users.*')
            ->selectRaw('( 3959 * acos( cos( radians(?) ) *
                           cos( radians( lat ) )
                           * cos( radians( lng ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( lat ) ) )
                         ) AS distance', [$latitude, $longitude, $latitude])
            ->where('is_cook','=', true)
            ->havingRaw("distance < ?", [$radius])
            ->get();

        return $cooks;
    }

}