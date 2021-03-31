<?php

namespace App\Http\Controllers\Frontend;

use App\City;
use App\Menu;
use App\Review;
use App\Package;
use App\Product;
use App\Business;
use App\BusinessCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Helper\HelperController;

class BusinessController extends Controller
{
    public function index($slug, Request $request)
    { 
        $helper = new HelperController();
        $data = [];
        $business = Business::where('id', $slug)->with('images','reviews')->first();
        $standard_packages = Package::where('event_id',1)->get();
        $vip_packages = Package::where('event_id',2)->get();
        $menus = Menu::where('business_id',$business->id)->with('products')->get(); 
      
        $products = [];
        foreach($menus as $menu)    {
            foreach(Product::where('menu_id', $menu->id)->get() as $p)    {
           $products[] =$p;
         }
        }
      
        return view('frontend.business', compact('business','data', 'menus','products','standard_packages','vip_packages'));

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
