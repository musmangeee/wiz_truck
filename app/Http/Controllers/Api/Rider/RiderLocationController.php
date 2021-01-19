<?php

namespace App\Http\Controllers\Api\Rider;

use App\User;
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
    public function setRidderLocation(Request $request,$id)
    {
        $user_id   = $request->user()->id;
        $data = $request->all();
        $data['user_id'] = $user_id;
        $rider = Ridderlogs::where('id',$user_id->id)->first();
    
        if ($rider == null) {
            Ridderlogs::create($data);
        }
        elseif($rider != null)
        {
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
        
        // dd($users);
        // $user = DB::table('model_has_roles')->where('role_id',4)->get();
       
        // $user = User::hasRole('rider');
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
            'status' =>true,
            'message' => $message,
        ]);   

    }

    public function assignOrder(Request $request)
    {
        $user = $request->user();
      
        $rider = Ridderlogs::where('user_id',$user->id)->first();
            $rider->status = "assigned";
            $rider->save();

        ([
            'status' =>true,
            'message' => "assigned order to rider",
            'order' =>$rider,
        ]); 

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

}
