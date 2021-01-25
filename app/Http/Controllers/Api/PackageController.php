<?php

namespace App\Http\Controllers\Api;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index(){

        $package =Package::all();
        return response()->json([
            'status' => true,
            'message' => 'Get Packages',
            'event' => $package,
            
        ]);
       }
}
