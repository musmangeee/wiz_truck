<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RidderController extends Controller
{
    public function ridderRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required', 
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
        
        // $ridder = Business::create([
        //     'user_id' => $user ->id,  
        //     'name'    => $request ->rider_name,
        //     'phone'   => $request ->phone, 
        //     'business_email' => $request ->business_email,
        // ]);



        $response = [
            "status" => "200",
            "message" => "Your ridder have register successfuly",
            "user" => $user,
            
           

        ];

        return response()->json($response);
    }
}
