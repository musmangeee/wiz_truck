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
        $orders = Order::where(['business_id' => $business->id,'status'=>$request->status])->with('productOrders')->get()->toArray();
        
        $restaurants_orders = $orders;

        foreach($orders  as $key1 => $order)
        {
            
            foreach($order['product_orders'] as $key2 => $po)
            {
                $restaurants_orders[$key1]['product_orders'][$key2]['product_details'] = Product::where('id',$po['product_id'])->first()->toArray();
            }
        }
       
        return response()->json([
            'status' =>true,
            'message' => 'order status get Successfully',
            'orders ' =>$restaurants_orders ,
             
        ]);

    }

    public function businessOrderHistory()
    {
        $id = auth::guard('api')->user()->id;
        // ! Get business form id
        $business = Business::where('user_id',$id)->first();
        $business_orders_sum = Order::where('business_id',$business->id)->where('status' , 'deliver')->sum('total');
        $user_orders = Order::where('business_id',$business->id)->where('status' , 'deliver')->get();
         $res = [
            'status' => true,
            'message' => "Business earning.", 
            'BusinessTotalEarning' =>  $business_orders_sum,
            'Businessorders' => $user_orders
           
        ];
        return response()->json($res, 200);
    }
}
