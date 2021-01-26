<?php

namespace App\Http\Controllers\Api\Rider;
use App\User;
use App\Order;
use App\Business;
use App\Location;
use Carbon\Carbon;
use App\Ridderlogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Notification\NotificationController;

class RiderLocationController extends Controller
{
    // ! Set Ridder Location

    public function setRidderLocation(Request $request, $id)
    {
        $user_id   = $request->user()->id;
        $data = $request->all();
        $data['user_id'] = $user_id;
        $rider = Ridderlogs::where('id', $user_id->id)->first();

        if ($rider == null) {
            Ridderlogs::create($data);
        } elseif ($rider != null) {
            $rider->update($data);
            $res = [
                'status' => true,
                'message' => 'Record updated successfully',
                'rider' => $rider

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
            $device_token = User::where('id', $r->user_id)->first()->device_token;
            $notification = new NotificationController();
            $notification->sendNotification('Order BroadCast', $device_token);
            $message = "BroadCast Message";
        }

        return response()->json([

            'status' => true,
            'message' => $message,
            'message' => 'Notification send to all riders',
            'status' => true,

        ]);
    }

    public function assignOrder(Request $request)
    {
        $user = Auth::guard('api')->user()->id;
        $order_id = $request->order_id;

        if (Ridderlogs::where('user_id', $user)->where('status', 'assigned')->first() != null) {
            return response()->json([
                'status' => false,
                'message' => "Order already assigned.",
            ]);
        } else {
            $rider =   new Ridderlogs();
            $commision = Order::find($order_id)->total;
            // dd($commision);
            $commision = ($commision * 12.5 / 100);
            $rider->commision = $commision;
            $rider->user_id = $user;
            $rider->order_id =   $order_id;
            $rider->status = 'assigned';
            $rider->save();
            return response()->json([
                'status' => true,
                'message' => "Assigned order to rider.",
            ]);
        }
    }
    public function deliver_order(Request $request)
    {
        $user = Auth::guard('api')->user();
        // $business = Business::where('user_id', $user->id)->first();
        $rider = Ridderlogs::where(['user_id'=> $user->id,'order_id'=>$request->order_id])->first();
        $order = Order::find($request->order_id);
        $order->status='deliver';
        $order->save();
        $rider ->status = 'null';
        $rider->commision = $order->total * 12.5 / 100;
        $rider->save();
        // ! Notification
        $notification = new NotificationController();
        $notification->sendNotification('Order Deliver', $order->user->device_token);
        // $notification->sendNotification('Order Deliver', $business->user->device_token);
       
       
        return response()->json([
            'status' => true,
            'message' => "pickup order to rider",
            'rider' => $rider,
            'order'=>$order,
        ]);
    }
    public function pickup_order(Request $request)
    {
        $user = Auth::guard('api')->user();
        
        $rider = Ridderlogs::where(['user_id'=> $user->id,'order_id'=>$request->order_id])->first();
         $order = Order::find($request->order_id);
        
        $order->status='pickup';
        $order->save();
        $rider->status = 'assigned';
        $rider->save();

        return response()->json([
            'status' => true,
            'message' => "pickup order to rider",
            'rider' => $rider,
            'order'=>$order,
        ]);
    }


    public function OrderHistory()
    {
        $user = Auth::guard('api')->user()->id;
        $rider = Ridderlogs::where('user_id', $user)->with('orders')->get();
        $rider_sum = Ridderlogs::where('user_id', $user)->sum('commision');

        $res = [
            'message' => true,
            'rider' => $rider,
            'Ridersum' => $rider_sum,
        ];
        return response()->json($res);
    }
    public function orderTrack()
    {

        $latitude=null;
        $longitude=null;
        $id = auth::guard('api')->user()->id;
        $rider  = Ridderlogs::where('user_id' , $id)->where('status','assigned')->with('orders')->first();

        if($rider != null){
            $business_id = $rider->orders->business_id;
            $buz = Business::find($business_id);
            $latitude = $buz->latitude;
            $longitude = $buz->longitude;
        }else{

            $message = 'there is no order assign rider';
        }

        $res = [
             'status' => true,
             'message' => 'Specific order',
             'rider' => $rider,
             'business_latitide' =>$latitude ,
             'business_longitude' =>$longitude ,
        ];
        return response()->json($res);
    }
    public function riderEarning()
    {
        $id = auth::guard('api')->user()->id;
         // ! Rider Total sum
        $rider = Ridderlogs::where('user_id',$id)->where('status' , 'delivered')->first();
        // ! Rider Today sum
        $rider_now = Ridderlogs::where('user_id',$id)->where('status' , 'delivered')->whereDate('created_at', Carbon::today())->first();
        $rider_sum = $rider->sum('commision');
        $rider_sum_now = $rider->whereDate('created_at', Carbon::today())->sum('commision');
        
    
        // ! Response     
        $res = [
            'status' => true,
            'message' => "Rider total earning.", 
            'RiderTotalEarning' => $rider_sum,
            'RiderTodayEarning' =>  $rider_sum_now
        ];
        return response()->json($res, 200);
    }
}
