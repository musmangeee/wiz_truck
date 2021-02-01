<?php

namespace App\Http\Controllers\Api\Rider;

use App\Review;
use App\Ridderlogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RiderReviewController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::guard('api')->user();
         
        $riderlog = Ridderlogs::where('user_id',$user->id)->first();
        
        $review=[];
        
        if(!$riderlog == null)
        {
            $review = Review::where('ridderlog_id',$riderlog->id)->get();
        }
        
       return response()->json([
          'status' => 200,
          'message' => 'Review got successfully',
          'data' => $review,
        
       ]);

    }
    public function store(Request $request)
        {
            $user = Auth::guard('api')->user();
            
          $validator = Validator::make($request->all(), [
           
            'ridderlog_id'=>'required|integer',
            'text'=> 'required',
            'stars'=>'required',
        ]);
           
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $review = new Review();
        $review->user_id = $user->id;
        $review->ridderlog_id = $request->ridderlog_id;
        $review->text = $request->text;
        $review->stars = $request->stars;
        $review->save();
        return response()->json([
            'status' => 200,
            'message' => 'Review post successfully',
            'data' => $review,
          
         ]);
         
        }
}
