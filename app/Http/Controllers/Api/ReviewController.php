<?php

namespace App\Http\Controllers\Api;

use App\Review;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function reviewAgainstBusiness()
    {
        $id = auth('api')->user()->id;
        $business = Business::where('user_id',$id)->first();
        $review = Review::where('business_id',$business->id)->get();
        $res = [
            'status'  =>  true,
            'message' => 'Review from user',
            'review'  =>  $review
        ];
        return response()->json($res);
    }
}
