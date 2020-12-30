<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\User;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OwnerRestaurantController extends Controller
{
    public function index(request $request)
    {
        $user = $request->user();
     
        $business = Business::where('user_id',$user->id)->get();
        
        return response()->json($business);
    }
}
