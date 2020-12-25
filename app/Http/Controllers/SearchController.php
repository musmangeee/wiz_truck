<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessCategory;
use App\Category;
use App\City;
use App\Http\Controllers\Helper\HelperController;
use App\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function set_location(Request $request){
        {
      
            $helper = new HelperController();
    
            $find = $helper->get_find($request->find);
            
            
            $location = $helper->get_location($request->location);
            
            $helper->set_location_preferences($request->location);
        
          
            if ($find['type'] == 'top_business_search') {
    
                if ($location['message'] == 'The Town or City is non found in record!') {
                    $city_id = City::where('name', $request->location)->first();
                    $search_results = Business::where('city_id', $city_id)
                        ->withCount('reviews')
                        ->orderBy('reviews_count', 'desc')->get();
                        
                } else {
                    $search_results = Business::where('town_id', $location['town']['id'])
                        ->withCount('reviews')
                        ->orderBy('reviews_count', 'desc')->get();
                      
                }
            } elseif ($find['type'] == 'category_search') {
                $helper->set_category_preferences($request->find);
    
                $businessCategory = BusinessCategory::where('category_id', $find['category']['id'])
                    ->pluck('business_id');
                $search_results = Business::findMany($businessCategory);
            } elseif ($find['type'] == 'business_search') {
                $search_results = Business::where('id', $find['business']['id'])->get();
                    
            } elseif ($find['type'] == 'keywords_search') {
                $search_results = Business::where('name', 'LIKE', '%' . $find['keywords'] . '%')
                    ->where('town_id', $location['town']['id'])->get()
                    ;
            }
    
            $data = $helper->main_menu_data();
            $data['keywords'] = $find['keywords'];
          
            $data['search_results'] = $search_results;
    
            $b_ids = array();
    foreach($data['search_results']->toArray('id') as $id){
        $b_ids[] = $id['id'];
    }
    
        $data['search_results'] = Business::whereIn('id', $b_ids)->paginate(10);
            
            if(isset($location['location_string'])){
                $data['pref_location'] = $location['location_string'];
            }
    
            return redirect()->back();
        }
    }
    public function search(Request $request)
    {
      
        $helper = new HelperController();

        $find = $helper->get_find($request->find);
        
        
        $location = $helper->get_location($request->location);
        
        $helper->set_location_preferences($request->location);
    
      
        if ($find['type'] == 'top_business_search') {

            if ($location['message'] == 'The Town or City is non found in record!') {
                $city_id = City::where('name', $request->location)->first();
                $search_results = Business::where('city_id', $city_id)
                    ->withCount('reviews')
                    ->orderBy('reviews_count', 'desc')->get();
                    
            } else {
                $search_results = Business::where('town_id', $location['town']['id'])
                    ->withCount('reviews')
                    ->orderBy('reviews_count', 'desc')->get();
                  
            }
        } elseif ($find['type'] == 'category_search') {
            $helper->set_category_preferences($request->find);

            $businessCategory = BusinessCategory::where('category_id', $find['category']['id'])
                ->pluck('business_id');
            $search_results = Business::findMany($businessCategory);
        } elseif ($find['type'] == 'business_search') {
            $search_results = Business::where('id', $find['business']['id'])->get();
                
        } elseif ($find['type'] == 'keywords_search') {
            $search_results = Business::where('name', 'LIKE', '%' . $find['keywords'] . '%')
                ->where('town_id', $location['town']['id'])->get()
                ;
        }

        $data = $helper->main_menu_data();
        $data['keywords'] = $find['keywords'];
      
        $data['search_results'] = $search_results;

        $b_ids = array();
foreach($data['search_results']->toArray('id') as $id){
    $b_ids[] = $id['id'];
}

    $data['search_results'] = Business::whereIn('id', $b_ids)->paginate(10);
        
        if(isset($location['location_string'])){
            $data['pref_location'] = $location['location_string'];
        }

        return view('frontend.search', compact('data'));
    }


    public function set_search_preferences($category, $city)
    {
        $helper = new HelperController();
        if ($category != null)
            $helper->set_category_preferences($category);
        if ($city != null)
            $pref_city = $helper->set_location_preferences($city);
        else
            $pref_city = 'Abeka-Lapaz, Accra';
    }

    public function autocomplete_locations(Request $request)
    {
        $data = Town::select("name")
            ->where("name", "LIKE", "%{$request->input('query')}%")
            ->take('10')
            ->get('name');

        foreach ($data as $key => $d) {
            $town = Town::where('name', $data[$key]['name'])->first()->city_id;
            $city = City::where('id', $town)->first()->name;
            $data[$key]['name'] = $data[$key]['name'] . ', ' . $city;
        }

        if (count($data) == 0) {
            $helper = new HelperController();
            $data = City::where("name", "LIKE", "%{$request->input('query')}%")
                ->take('10')
                ->get('name');
        }

        return response()->json($data);
    }

    public function autocomplete_keyword(Request $request)
    {
        $data = Category::select("name")
            ->where("name", "LIKE", "%{$request->input('query')}%")
            ->take('10')
            ->get('name');


        if (count($data) == 0) {
            $helper = new HelperController();

 //           $town_id = Town::where('name', $helper->parse_town($request->location))->first()->id;
            $data = Business::select("name")
//                ->where("town_id", $town_id)
                ->where("name", "LIKE", "%{$request->input('query')}%")
                ->take('10')
                ->get('name');
        }
        return response()->json($data);
    }

    public function autocomplete_business(Request $request)
    {
        
        $data = Business::select("name")
            ->where("name", "LIKE", "%{$request->input('query')}%")
            ->take('10')
            ->get('name');

        return response()->json($data);
    }

    public function autocomplete_city(Request $request)
    {

        $data = City::where("name", "LIKE", "%{$request->input('query')}%")
            ->take('10')
            ->get('name');

        return response()->json($data);
    }

    public function autocomplete_town(Request $request)
    {
        $data = Town::where("name", "LIKE", "%{$request->input('query')}%")
            ->take('10')
            ->get('name');

        return response()->json($data);
    }

    public function list_cities(Request $request)
    {
        $data = Town::select('name', 'id')
            ->where("city_id", $request->city)
            ->take('10')
            ->get();

        return response()->json($data);
    }


    public function search_cities(Request $request)
    {
       
       
        $helper = new HelperController();

        $find = $helper->get_find($request->find);
        
        
        $location = $helper->get_location($request->location);
       
        
        $helper->set_location_preferences($request->location);
    
        

        if ($find['type'] == 'top_business_search') {

            if ($location['message'] == 'The Town or City is non found in record!') {
                $city_id = City::where('name', $request->location)->first();
                $search_results = Business::where('city_id', $city_id)
                    ->withCount('reviews')
                    ->orderBy('reviews_count', 'desc')
                    ->get();
            } else {
                $search_results = Business::where('town_id', $request->town)
                    ->withCount('reviews')
                    ->orderBy('reviews_count', 'desc')
                    ->get();
            }
        } elseif ($find['type'] == 'category_search') {
            $helper->set_category_preferences($request->find);

            $businessCategory = BusinessCategory::where('category_id', $find['category']['id'])
                ->pluck('business_id');
            $search_results = Business::findMany($businessCategory);
        } elseif ($find['type'] == 'business_search') {
            $search_results = Business::where('id', $find['business']['id'])
                ->get();
        } elseif ($find['type'] == 'keywords_search') {
            $search_results = Business::where('name', 'LIKE', '%' . $find['keywords'] . '%')
                ->where('town_id', $location['town']['id'])
                ->get();
        }

        $data = $helper->main_menu_data();
        $data['keywords'] = $find['keywords'];
      
        $data['search_results'] = $search_results;

        $b_ids = array();
            foreach($data['search_results']->toArray('id') as $id){
                $b_ids[] = $id['id'];
            }

        $data['search_results'] = Business::whereIn('id', $b_ids)->paginate(5);
        
        if(isset($location['location_string'])){
            $data['pref_location'] = $location['location_string'];
        }

    

        return view('frontend.search', compact('data'));
    }
}
