<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        
        $orders = Order::all();  
        return View('admin.payment.index', compact('orders'));
    }
}
