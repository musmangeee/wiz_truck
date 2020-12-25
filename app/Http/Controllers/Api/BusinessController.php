<?php

namespace App\Http\Controllers\Api;

use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    public function index($location = null)
    {
        $business = Business::with('categories','images')->paginate(10);
        return response()->json($business, 200);
    }
}
