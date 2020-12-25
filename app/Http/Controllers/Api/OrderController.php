<?php

namespace App\Http\Controllers\Api;
use App\Business;
use App\Menu;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function business_order(Request $request, $id)
    {

        $business = Business::where('id',$id)->paginate(10);
        $order = Order::where('business_id',$id)->with('user')->get();
        return response()->json([
            'status' =>true,
            'message' => 'Successfully!!!!',
            'order' => $order, 
        ]);

        
        
    }

    public function user_order(Request $request, $id)
    {
        
        $user = User::where('id',$id)->paginate(10);
        $order = Order::where('user_id',$id)->with('restaurant')->get();
        return response()->json([
            'status' =>true,
            'message' => 'Successfully!',
            'order' => $order,
        ]);

        
    }


}
