<?php

namespace App\Http\Controllers\Api;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    public function get_details(Request $request)
    {
        $user = Auth::guard('api')->user();
        $order = Order::where('user_id', $user->id)->get();
        return response()->json([
            'status' =>true,
            'message' => 'order get Successfully',
            'order' =>$order,
        ]);
    }

    // ! User's Order History
    public function userOrderHistory(Request $request)
    {
        $id = auth::guard('api')->user()->id;
        $user_orders = Order::where('user_id',$id)->where('status' , 'deliver')->get();
        $user_orders_sum = Order::where('user_id',$id)->where('status' , 'deliver')->sum('total');

         // ! Response     
         $res = [
            'status' => true,
            'message' => "User's earning.", 
            'UserTotalEarning' =>  $user_orders_sum ,
            'User_orders' => $user_orders
           
        ];
        return response()->json($res, 200);
    }

}
