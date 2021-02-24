<?php

namespace App\Http\Controllers;

use App\Order;
use App\Review;
use App\Business;
use App\Ridderlogs;
use App\BusinessCategory;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Helper\HelperController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user()->id;
      //  $ridderlogs = Ridderlogs::where('user_id', $user)->first();
        $business = Business::where('user_id', $user)->first();
        $orders = Order::where('business_id', $business->id)->get()->count();
        $completed_order = Order::where('status', 1)->get()->count();
        $pending_order =  Order::where('status', 0)->get()->count();
        $total = Order::where('status', '=', 1)->sum('total');

        return view('business.dashboard', compact('orders', 'completed_order', 'pending_order', 'total'));
    }
}
