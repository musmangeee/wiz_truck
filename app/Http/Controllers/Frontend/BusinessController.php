<?php

namespace App\Http\Controllers\Frontend;

use App\Business;
use App\BusinessCategory;
use App\City;
use App\Menu;
use App\Product;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BusinessController extends Controller
{
    public function index($slug, Request $request)
    {

       
       
       
        $helper = new HelperController();
        $data = [];
        $business = Business::where('id', $slug)->with('images')->first();
       
        $menus = Menu::where('business_id',$business->id)->with('products')->get(); 
        
        $products = [];
        foreach($menus as $menu)    {
            foreach(Product::where('menu_id', $menu->id)->get() as $p)    {
           $products[] =$p;
         }
        }
      
        return view('frontend.business', compact('business','data', 'menus','products'));

    }


    public function create(Request $request)
    {

      
        $helper = new HelperController();
        $categories = BusinessCategory::all();

        $searched_category = $request->category;
        $pref_categories = $helper->get_category_preferences();
        $city = $request->city == null ? $helper->get_location_preferences() : $request->city;
            $cities = City::all();
        if(!Auth::check())
        {
            Session::flash('message', "Please create an account to sign up for business!");
            return redirect('signup');
        }
        $pref_city = $city = $request->city == null ? $helper->get_location_preferences() : $request->city;
        return view('frontend.business.create', compact( 'categories', 'searched_category', 'city', 'cities', 'pref_city', 'pref_categories'));
    }
}
