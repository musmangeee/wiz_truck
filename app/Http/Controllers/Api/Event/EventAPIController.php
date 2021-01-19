<?php

namespace App\Http\Controllers\Api\Event;

use App\Event;
use App\Business;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventAPIController extends Controller
{
    public function create_event(Request $request){
         
        $validator =  Validator::make($request->all(), [
            'start_date' => 'required',
            'end_date'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'status'=>'required',
            'business_id' => 'required',
        ]);
        $user_id = Auth::guard('api')->user()->id;
        
        $event = Event::where('start_date', '<=', $request->start_date)->where('end_date', '>=', $request->end_date)->first();
   
        if($event == null){
        $message ="Event Booked Successfully";
           $event = Event::create([
            'user_id'=>$user_id,
            'business_id'=>$request->business_id,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'start_time' =>$request->start_time, 
            'end_time'=>$request->end_time,
            'status'=>$request->status,
            
           ]);
        }else{
            $event = null;   
            $message = "The event already booked"; 
        }
         
           return response()->json([
            'status' =>true,
           'message' => $message,
           'event' =>$event,
        ]);
  
    }
}
