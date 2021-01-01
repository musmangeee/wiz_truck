<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
class OrderController extends Controller
{
    public function index(Request $request)
    {
       
        $user = $request->user();
        $business = Business::where('user_id',$user->id)->first();
        $order = Order::where('business_id',$business->id)->get(); 
        
        return View('business.dashboard', compact('order'));
    }
    
}
