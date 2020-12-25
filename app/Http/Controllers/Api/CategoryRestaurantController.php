<?php

namespace App\Http\Controllers\Api;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryRestaurantController extends Controller
{
    public function get_category_restaurant($id)
    {
        $category = Category::where('id', $id)->with('businesses')->first();
       
        return response()->json($category, 200);
    }
}
