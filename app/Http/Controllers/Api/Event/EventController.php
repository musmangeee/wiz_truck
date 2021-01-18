<?php

namespace App\Http\Controllers\Api\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function create_event(Request $request){
        
        $input = $request->all();
        $validator =  Validator::make($request->all(), [
            'business_id' => 'required',
            'start_date' => 'required',
            'end_date'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'status'=>'required',
           ]);
           
           $event = Event::create([
            'business_id'=>$request->business_id,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'start_time' => $request ->start_time, 
            'end_time'=>$request->end_time,
            'status'=>$request->status,
            
           ]);
         
           return response()->json([
            'status' =>true,
           'message' => 'Order Created Successfully',
           'order' =>$event,
        ]);
  
    }
}
