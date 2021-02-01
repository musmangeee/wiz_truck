<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Order;
use App\Business;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        
        $order = Order::all()->count();
        $restaurants = Business::all()->count();
        $clients  = User::role('user')->count();
        $users = User::latest()->take(5)->get();
        $total_sum = Order::sum('total');
        $orders = Order::latest()->take(5)->get();
        
       
        // Get All Business 
        $business = Business::take(4)->with('images','categories','reviews')->get();
       
        return view('admin.index' , compact('order','restaurants','clients','business','total_sum','users','orders'));
    }
}
