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
        public function list_event(Request $request){

            $user_id = Auth::guard('api')->user()->id;
            $event = Event::where('user_id',$user_id)->get();
            return response()->json([
                'status' =>true,
               'message' =>'Get Event Successfully',
               'event' =>$event,
            ]);


        }
        public function delete_event(Event $event){
          $event->delete();
          return response()->json([
            'status' =>true,
           'message' =>'Event Deleted Successfully',
           'event' =>$event,
        ]);

        }
         
        public function cancel_event(Request $request){
           
            $user = $request->user();
            $status = false;
            $message = "";
            
            if($user == null){
                $message = "You have no user account associated with your email.";
                }
            else{
                 $event = Event::where('id',$request->event_id)->first();
                if($event != null){
                    $event->status = "cancel";
                    $status= true;
                    $event->save();
                    $message = "The event have been canceled"; 
                }
                else{
                    $message = "You have no event associated with your user email."; 
                   }
                   return response()->json([
                    'status' =>$status,
                    'message' => $message,
                    'event' =>$event,
                ]);  
            }    
        }
        public function accepted_event(Request $request){
           
            $user = $request->user();
            $status = false;
            $message = "";
            
            if($user == null){
                $message = "You have no user account associated with your email.";
                }
            else{
                 $event = Event::where('id',$request->event_id)->first();
                if($event != null){
                    $event->status = "accepted";
                    $status= true;
                    $event->save();
                    $message = "The event have been accepted"; 
                }
                else{
                    $message = "You have no event associated with your user email."; 
                   }
                   return response()->json([
                    'status' =>$status,
                    'message' => $message,
                    'event' =>$event,
                ]);  
            }    
        }


}
