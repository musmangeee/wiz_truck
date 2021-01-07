<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderManagementController extends Controller
{
    public function order_exists(Request $request){
        
       
        $input['user_id'] = $request->user()->id;
        if(Order::where(['user_id' => $input['user_id'] ,'status' => 'pending'])->exists()){
            return response()->json([
                'status' =>true,
                'message' => 'order is already in exist',
            ]);
        }

    }
}
