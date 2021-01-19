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
    // ! Register Ridder 
    public function ridderRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'last_name' => 'required',
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
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->assignRole($role);

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        

        $response = [
            "status" => "200",
            "message" => "Your ridder have register successfuly",
            "user" => $user,
            'access_token' =>$success['token']
            
           

        ];

        return response()->json($response);
    }

    // ! Set Ridder Location
  
}
