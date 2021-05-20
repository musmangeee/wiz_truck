<?php

namespace App\Http\Controllers\Api;

use App\Event;
use App\Booking;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\Notification\NotificationController;
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

    public function check_booking(Request $request){
        
       $message=[];
       $user = Auth::guard('api')->user();
       $booking = Booking::where(['user_id' => $user->id, 'business_id' => $request ->business_id])->whereIn('status', ['accepted','pending'])->get();
 
       if ($booking == true) {
        return response()->json([

            'message' => 'Event is already in exist from this Restaurant',
            'booking'=>$booking,

        ]);
       }
       else{
           return response()->json([
            'message' => 'There in no booking register in this restaurant',
             'booking'=>$booking,
            ]);
            
           }        
    


    }

    public function specific_business(Request $request){
       
        $booking = Booking::where('business_id', $request->business_id)->with('package','event')->get();
        
        
        return response()->json([
            'status' =>true,
            'booking' => $booking,
        ]);
    }
    public function accept_event(Request $request)
    {
        $user = $request->user();
        $message = "";
        $status = false;
        $business = Business::where('user_id', $user->id)->first();
         
        if ($business == null) {

            $message = "You have no business account associated with your email.";
        } else {
            $event = Booking::where(['business_id' => $business->id, 'id' => $request->event_id])->first();
        
            if ($event != null) {
                $event->status = "accepted";
                $status = true;
                $event->save();

                //  // ! Sending push notification
                //  $notification = new NotificationController();
                //  $notification->sendNotification('Event Accepted', $event->user->device_token);
                //  $notification->sendNotification('Event Accepted', $business->user->device_token);
                 
                $message = "The Event have been accepted";

            } else {

                $message = "You have no Event associated with your business email.";
            }
        }
            return response()->json([
            'status' => $status,
            'message' => $message,
            'event' => $event,
        ]);
    }
    public function pending_event(Request $request)
    {
        $user = $request->user();
        $business = Business::where('user_id', $user->id)->first();
        $event = Booking::where(['business_id'=> $business->id,'status' =>'pending'])->with('package','event')->get();
       
        return response()->json([
            'status' => true,
            'message' => 'Events get Successfully',
            'event' => $event,
        ]);
    } 
    public function accepted_event_list(Request $request)
    {
        $user = $request->user();
        $business = Business::where('user_id', $user->id)->first();
        $event = Booking::where(['business_id'=> $business->id,'status' =>'accepted'])->with('package','event')->get();
       
        return response()->json([
            'status' => true,
            'message' => 'Events get Successfully',
            'event' => $event,
        ]);
    }
    
    public function cancelled_event(Request $request)
    {
        $user = $request->user();
        $message = "";
        $status = false;
        $business = Business::where('user_id', $user->id)->first();
        
        if ($business == null) {
            $message = "You have no business account associated with your email.";
        } else {
            $event = Booking::where(['business_id' => $business->id, 'id' => $request->booking_id])->first();
        
            if ($event != null) {
                $event->status = "cancelled";
                $status = true;
                $event->save();
                $message = "The Event have been cancelled";
            } else {
                $message = "You have no Event associated with your business email.";
            }
      
        }
   
            return response()->json([
            'status' => $status,
            'message' => $message,
            'event' => null,
        ]);
    }
    

}
