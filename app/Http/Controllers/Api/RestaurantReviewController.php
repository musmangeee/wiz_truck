<?php

namespace App\Http\Controllers\Api;
use App\Business;
use App\Review;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantReviewController extends Controller
{
    public function index(Request $request, $id)
    {
        $business = Business::where('id', $id)->with('reviews')->first();
        return response()->json([
            'status' =>true,
            'message' => 'Successfully!',
            'business' => $business,
            
            
        ]);


    }
}
