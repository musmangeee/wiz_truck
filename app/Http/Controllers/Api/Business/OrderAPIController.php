<?php

namespace App\Http\Controllers\Api\Business;

use App\Order;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderAPIController extends Controller
{
    public function get_details(Request $request)
    {
        $user = Auth::guard('api')->user();
      
        $business = Business::where('user_id',$user->id)->first();
        $order = Order::where('business_id', $business->id)->get();
        return response()->json([
            'status' =>true,
            'message' => 'order get Successfully',
            'order' =>$order,
        ]);
        
        
    }
    public function order_by_status(Request $request)
    {
    
        $user = Auth::guard('api')->user();
        $business = Business::where('user_id',$user->id)->first();
        $order = Order::where(['business_id' => $business->id,'status'=>$request->status])->get();
        return response()->json([
            'status' =>true,
            'message' => 'order status get Successfully',
            'order' =>$order,
        ]);

    }
}
