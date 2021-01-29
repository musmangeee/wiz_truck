<?php

namespace App\Http\Controllers\Api;

use App\Business;
use App\BusinessBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BusinessBookingController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::guard('api')->user();
        
        $business = Business::where('user_id', $user->id)->first();
     
        $validator = Validator::make($request->all(), [
           
            'booking_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $business_booking = BusinessBooking::create([
            'booking_id' => $request->booking_id,
            'business_id' => $business->id,
        ]);
        
        return response()->json([
            'status' => true,
            'message' => 'business booking created successfully',
            'booking' => $business_booking,
            
    ]);
}



}
