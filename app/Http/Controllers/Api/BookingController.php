<?php

namespace App\Http\Controllers\Api;

use App\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
       $booking = Booking::all();
       return response()->json([
        'status' => true,
        'message' => 'Get booking Event',
        'event' => $booking,
        
    ]);

    }
    public function store(Request $request)
    {
        $user = Auth::guard('api')->user();
  
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'total_person' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $booking = Booking::create([
            'user_id' => $user->id,
            'package_id' => $request->package_id,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_person' => $request->total_person,

        ]);


       return response()->json([
        'status' => true,
        'message' => 'Created successfully',
        'booking' => $booking,
        
    ]);
    }
    public function update(Request $request , $id)
    {
        
        $input = $request->all();
        $booking = Booking::find($id);
        $booking->update($input); 
        return response()->json([
            'status' => true,
            'message' => 'updated successfully',
            'booking' => $booking,
            
        ]);
        
    }
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json([
            'status' =>true,
            'message' => 'Booking Deleted Successfully!',
            'product' => $booking,
            
            
        ]);
    }
}
