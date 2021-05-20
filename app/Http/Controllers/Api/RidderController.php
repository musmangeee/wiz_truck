<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Business;
use App\RiderDocs;
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
            'role' => 'required|integer',
            'license'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
            'dob' => 'required',
            'social_security_number' => 'required',
            'registration_file'  => 'required|mimes:doc,docx,pdf,txt,png,jpg,jpeg|max:3048',
            
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
       
  

        $user = new User();
        $user->device_token = $request->device_token;
        $user->name = $request['first_name'].' '.$request['last_name'];
        $user->password = bcrypt($request['password']);
        $user->email = $request->email;
        $user->dob = $request->dob;
          
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/riderprofile', $name);
            $user->image = $name;
            
        }

        $user->save();
        

       
        $success['token'] =  $user->createToken('MyApp')->accessToken;


        if ($request->role) {
            
            $user->assignRole($request->role); 
        }
        




         // !! Store Passport and driving license
         $uploadid = new RiderDocs();
       
         if ($file = $request->file('license')) {
             $name = time() . $file->getClientOriginalName();
             $file->move('public/license', $name);
             $uploadid->license = $name;
             
         }
         
         if ($file = $request->file('registration_file')) {
 
             $name = time() . $file->getClientOriginalName();
             $file->move('public/registration_file', $name);
             $uploadid->registration_file = $name;  
 
         }
     
             $uploadid->user_id = $user->id;
             $uploadid->social_security_number = $request->social_security_number;
             $uploadid->save();
 

       

        $response = [
            "status" => "200",
            "message" => "Your ridder have register successfuly",
            "user" => $user,
            'role' => $user->getRoleNames(),
            'access_token' =>$success['token'],
           

        ];


        return response()->json($response);
    }

  
    public function rider_info(Request $request)
    {
        // dd("test");
        $user_info = User::where('id' , $request->user_id)->with('rider_docs')->first();
        // dd($user_info);
        return response()->json($user_info);
    }
  
}
