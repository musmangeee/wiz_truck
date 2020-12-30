<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessCategory;
use App\City;
use App\Http\Controllers\Helper\HelperController;
use App\Mail\VerifyEmail;
use App\Review;
use App\Town;
use App\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $user = $request->user();
        $business = Business::where('user_id',$user->id)->first();
        $orders = Order::where('business_id',$business->id)->get()->count(); 
        $completed_order = Order::where('status',1)->get()->count();
        $pending_order =  Order::where('status',0)->get()->count();
         
        return view('business.dashboard', compact('orders','completed_order','pending_order'));
    }


     
}
