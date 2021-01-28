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
        
       $booking = Booking::with('packages')->get();
       
       return response()->json([
        'status' => true,
        'message' => 'Get booking Event',
        'event' => $booking,
        
       ]);

    }
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
         
        if (Booking::where(['user_id' => $input['user_id'], 'status' => 0])->exists()) {
            return response()->json([

                'message' => 'Event is already in exist'

            ]);

        }
  
        $validator = Validator::make($request->all(), [
            'package_id' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'total_person' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if ($request->payer == 'host') 
        {
            $booking = Booking::create([
                'user_id' => $request->user()->id,
                'package_id' => $request->package_id,
                'status' => $request->status,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'start_time'=>$request->start_time,
                'end_time' => $request->end_time,
                'total_person' => $request->total_person,
            ]);
        }
        

        

        return response()->json([
            'status' => true,
            'message' => 'Event Created successfully',
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
            'message' => 'Event updated successfully',
            'booking' => $booking,
            
        ]);
        
    }
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return response()->json([
            'status' =>true,
            'message' => 'Event Deleted Successfully!',
            'product' => $booking,
            
            
        ]);
    }
    public function specific_booking(Request $request){
        $user = Auth::guard('api')->user();
        $booking = Booking::where('user_id', $user->id)->get();
        return response()->json([
            'status' =>true,
            'message' => 'Event get Successfully!',
            'product' => $booking,
            
            
        ]);
    }
}
