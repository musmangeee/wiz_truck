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
}
