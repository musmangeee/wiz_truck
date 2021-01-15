<?php

namespace App\Http\Controllers\Api\Business;

use App\Order;
use App\Business;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class OrderAPIController extends Controller
{
    public function get_details(Request $request)
    {
        $user = Auth::guard('api')->user();
      
        $business = Business::where('user_id',$user->id)->first();
        $order = Order::where('business_id', $business->id)->with('productOrders')->first();
        $pro_id  = $order->productOrders[0]['product_id'];
        $products = Product::where('id',$pro_id)->get();
    
       
        return response()->json([
            'status' =>true,
            'message' => 'order get Successfully',
            'order' =>$order,
            'products' => $products
        ]);
        
        
    }
    public function order_by_status(Request $request)
    {
    
        $user = Auth::guard('api')->user();
        $business = Business::where('user_id',$user->id)->first();
        $order = Order::where(['business_id' => $business->id,'status'=>$request->status])->with('productOrders')->first();
       
        $pro_id  = $order->productOrders[0]['product_id'];
        
        $products = Product::where('id',$pro_id)->get();
        return response()->json([
            'status' =>true,
            'message' => 'order status get Successfully',
            'order' =>$order,
            'products'=>$products,
        ]);

    }
}
