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
         $user_id = Auth::user()->id;
         

        if (Booking::where(['user_id' => $user_id, 'business_id' => $request ->business_id])->exists()) {
            return response()->json([

                'message' => 'Event is already in exist from this Restaurant'

            ]);

        }
  
        $validator = Validator::make($request->all(), [
            'package_id' => 'required', 
            'business_id' =>'required',
            'event_id' => 'required',
            'payer' => 'required',
            'address' => 'required',
            'zip_code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'occasion' => 'required',
            'eaters' => 'required',
            'menu_id'=> 'required',
            'phone_number' => 'required',
            'final_detail' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        
        $booking = Booking::create([
            'user_id' => $user_id,
            'package_id' => $request->package_id,
            'business_id' =>$request ->business_id,
            'event_id' => $request ->event_id,
            'payer' => $request->payer,  
            'address' => $request ->address,
            'zip_code' => $request ->zip_code, 
            'start_date' => $request ->start_date, 
            'end_date' => $request ->end_date , 
            'start_time' => $request ->start_time,
            'end_time' =>  $request ->end_time, 
            'occasion' => $request ->occasion,
            'eaters' => $request ->eaters,  
            'menu_id' =>$request->menu_id, 
            'phone_number' => $request ->phone_number , 
            'final_detail'  => $request ->final_detail,  
        ]);
 
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
