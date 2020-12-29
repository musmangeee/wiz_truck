<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    public function index($location = null)
    {
        $business = Business::with('categories','images')->paginate(10);
        return response()->json($business, 200);
    }
    public function ApiRegister(Request $request)
    {
       

        $validator = Validator::make($request->all(), [
            'name'    => 'required|string',
            'email'   => 'required|string|email|unique:users',
            'password'=> 'required',
            'business_name' => 'required',
            'url'     => 'required',
            'phone'   => 'required',
            'business_email' => 'required|string|email|unique:businesses',
            'description' => 'required',
            'role' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        // unset($input['role']);
        $input = $request->all();
        $role = $input['role'];
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole($role);
        
        $business = Business::create([
            'user_id' => $user ->id,  
            'name' => $request -> business_name,
            'url' => $request -> url, 
            'phone' => $request -> phone, 
            'business_email' => $request -> business_email,
            'description' => $request -> description , 
        ]);



        $response = [
            "status" => "200",
            "message" => "Your business have register successfuly",
            "user" => $user,
            "business" => $business, 
           

        ];

        return response()->json($response);

    }


}
