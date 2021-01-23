<?php

namespace App\Http\Controllers\Api\Reviews;

use App\Review;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index(Request $request,$id)
    {
        $user = $request->user();
          
        $business = Business::where('user_id',$user->id)->first();
        $review=[];
        
        if(!$business == null)
        {
            $review = Review::where('business_id',$business->id)->get();
        }
        
       return response()->json([
          'status' => 200,
          'message' => 'Review got successfully',
          'data' => $review,
        
       ]);
       
       


    }
        public function store(Request $request)
        {
            
          $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'business_id'=>'required|integer',
            'text'=> 'required',
            'stars'=>'required',
        ]);
           
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
    
      
        $review = new Review();

        $review->user_id = $request->user()->id;
        $review->business_id = $request->business_id;
        $review->text = $request->message;
        $review->stars = $request->stars;
        $review->save();
         
        
        return response()->json([
            'status' => 200,
            'message' => 'Review post successfully',
            'data' => $review,
          
         ]);
         
        }
}
