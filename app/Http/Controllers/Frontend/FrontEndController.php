<?php

namespace App\Http\Controllers\Frontend;


use App\User;
use App\Review;
use App\Business;
use App\Category;
use App\Subscription;
use App\BusinessImage;
use App\BusinessCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController;


class FrontEndController extends Controller
{


    public function index()
    {
           
        $helper = new HelperController();
        $restaurants = Business::latest()->take(3   )->with('images','categories','reviews')->get();
        
               
           
        $pref_wallpaper = $helper->get_prefer_wallpaper();
        $data = [];
        $data['pref_wallpaper'] = $pref_wallpaper;
  
        $data['random_categories'] = Category::where('parent_id', NULL)->get()->random(4);
        $data['categories'] = Category::all();
        $data['categories_list'] = Category::where('parent_id', NULL)->get();

        return view('frontend.index', compact('data','restaurants'));
    }


    public function all_cities()
    {

        $helper = new HelperController();
        $data = $helper->main_menu_data();
        $cities = City::all();

        return view('frontend.cities', compact('cities', 'data'));
    }

    public function subscription(Request $request)
    {

        $this->validate($request, [
            'email' => 'required',
        ]);

        $input = $request->all();

        $subscription = Subscription::create($input);
        return redirect()->back()->with('success','Email subscribe successfully');
    }

    public function faq()
    {

        $helper = new HelperController();
        $data = $helper->main_menu_data();
        

        return view('frontend.faq', compact('data'));
    }

    public function privacy_policy()
    {

        $helper = new HelperController();
        $data = $helper->main_menu_data();
        

        return view('frontend.privacy_policy', compact('data'));
    }

    public function terms_conditions()
    {

        $helper = new HelperController();
        $data = $helper->main_menu_data();
        

        return view('frontend.terms_conditions', compact('data'));
    }

}
