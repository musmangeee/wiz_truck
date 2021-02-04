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
        
        $review = Review::where('business_id', $id)->with('user')->get();
   
        return response()->json([
            'status' =>true,
            'message' => 'Successfully!',
            'business' => $review,
            
            
        ]);


    }
}
