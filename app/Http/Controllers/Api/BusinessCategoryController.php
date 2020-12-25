<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\BusinessCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessCategoryController extends Controller
{
    public function index()
    {
        
        $business = Category::paginate(10);
        return response()->json($business, 200);
    }
    
}

