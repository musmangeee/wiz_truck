<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchlocation(Request $request, $radius = 1500)
    {
        
        $latitude  = $request->latitude;
        $longitude = $request->longitude;
        // 
        $users = User::role('admin')->pluck('id'); 
       
        // $user_ids = [];
        // foreach($users as  $user){
        //     $user_ids[]=$user['id'];
           
        // }
        $location = Location::whereIn('user_id',$users)->selectRaw("
        user_id,longitude,latitude,
        ( 6371000 * acos( cos( radians(?) ) *
          cos( radians( latitude ) )
          * cos( radians( longitude ) - radians(?)
          ) + sin( radians(?) ) *
          sin( radians( latitude ) ) )
         ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)->with('user')
            ->get();


        // dd(Location::whereIn('user_id',$user_ids)->get());



        return response()->json(["location" => $location]);
    }
}
