<?php

namespace App\Http\Controllers\Api;
use App\Menu;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Business;

class RestaurantController extends Controller
{
    public function index(Request $request, $id){
       
        // dd("hello");
        
       $business = Business::where('id',$id)->first();
       $menu = Menu::where('business_id',$business->id)->with('products')->get(); 
      
       return response()->json([
            'status' =>true,
            'message' => 'Successfully!',
            'business' => $business,
            'menu' => $menu,
            
        ]);

        
    
    }
}
