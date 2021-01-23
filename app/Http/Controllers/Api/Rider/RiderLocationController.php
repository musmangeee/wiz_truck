<?php

namespace App\Http\Controllers\Api\Rider;

use App\User;
use App\Order;
use App\Location;
use App\Ridderlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Notification\NotificationController;

class RiderLocationController extends Controller
{
    // ! Set Ridder Location
    public function setRidderLocation(Request $request)
    {        
        $user_id   = auth('api')->user()->id;
        // dd($user_id);
        $data = $request->all();
        $data['user_id'] = $user_id;
        $LOC = Location::where('user_id',$user_id)->first();
          
        if ($LOC == null) {
            // dd( $LOC = Location::where('id',$user_id)->first());
            Location::create($data);
        }
        else
        {
           
            $LOC->update($data);
            $res = [
                'status' => true,
                'message' => 'Record updated successfully',
                'rider' => $LOC
            ];
            return response()->json($res);
        }
        
    }

    public function broadcastOrder(Request $request)
    {
        
        
        $rider = Ridderlogs::all();
        $user = [];
        
        $count = 0; 
        foreach ($rider as $r) {
        $device_token = User::where('id' , $r->user_id)->first()->device_token;
        $notification = new NotificationController();
        $notification->sendNotification('Order BroadCast',$device_token);
        $message = "BroadCast Message"; 
        }

        return response()->json([
            'message' => 'Notification send to all riders',
            'status' =>true,
        ]);   

    }

    public function assignOrder(Request $request)
    {
        $user = Auth::guard('api')->user()->id;
        $order_id = $request->order_id;
        
           if(Ridderlogs::where('user_id',$user)->where('status','assigned')->first() != null)
           {
              return response()->json([
              'status' =>false,
              'message' => "Order already assigned.",
        ]); 

           }
           else 
           {
             $rider =   new Ridderlogs();
            $commision = Order::find($order_id)->total;
            // dd($commision);
             $commision = ($commision * 12.5 / 100);
             $rider->commision = $commision;
             $rider->user_id = $user;
             $rider->order_id =   $order_id;
             $rider->status='assigned';
             $rider->save();
             return response()->json([
            'status' =>true,
            'message' => "Assigned order to rider.",
             ]);
           }
           
           

     
    }
    public function deliver_order(Request $request)
    {
        $user = $request->user();
    
        $rider = Ridderlogs::where('user_id',$user->id)->first();
        $rider->status = "deliver";
        $rider->save();

        return response()->json([
            'status' =>true,
            'message' => "deliver order to rider",
            'order' =>$rider,
        ]);       
    }

    public function OrderHistory()
    {
        $user = Auth::guard('api')->user()->id;
        $rider = Ridderlogs::where('user_id',$user)->with('orders')->get();
        $rider_sum = Ridderlogs::where('user_id',$user)->sum('commision');
       
        $res = [
            'message' => true,
            'rider' => $rider,
            'Ridersum' => $rider_sum,
        ];
        return response()->json($res);

    }

    public function orderTrack()
    {
        $id     = auth::guard('api')->user()->id;
        // dd($id);
        $rider  = Ridderlogs::where('user_id' , $id)->where('status','assigned')->with('orders')->first();
        // return $rider;
        $res = [
             'status' => true,
             'message' => 'Specific order',
             'rider' => $rider
        ];
        return response()->json($res);
    }

 

}
