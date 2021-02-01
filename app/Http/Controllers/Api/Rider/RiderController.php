<?php

namespace App\Http\Controllers\Api\Rider;

use App\User;
use Carbon\Carbon;
use App\Ridderlogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RiderController extends Controller
{
  
   public function TodaysPendingOrders(Request $request){
     
      $user_id=$request-> user()->id;
     
      $newOrders=Ridderlogs::whereDate('created_at', Carbon::today())->where([
			['user_id',$user_id],
			['status','pending'],
       ])->get();

       dd($newOrders);
      return response()->json(['new_pending_orders'=>$newOrders]);
   }
   public function AllOrders(Request $request)
	{

      $user_id = $request->user()->id;
      
      $orders=ridderlogs::where('user_id',$user_id)->with('orders')->get();
       
		return response()->json([
         'status' =>true,
         'message' => 'Successfully!!!!',
         'orders' => $orders, 
     ]);
   }
   public function status(Request $request){

      $validator = Validator::make($request->all(), [
         'status' => 'required',
      ]);
      
      // $user_id = User::find(Auth::id);
      $user_id = $request->user()->id;
      
   }

}
