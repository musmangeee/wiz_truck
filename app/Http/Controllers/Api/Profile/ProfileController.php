<?php

namespace App\Http\Controllers\Api\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $email = $request->email;
        $phone = $request->phone;
        $full_name = $first_name.' '.$last_name;
        
        $validator =  Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone'=>'required',
           
            ]);
            
            $profile = User::find($id);
          
            $profile->update(['name'=>$full_name,'email'=>$email,'phone'=>$phone]);
            return response()->json([
               'status' =>true,
               'message' => 'profile updated Successfully',
               'profile' =>$profile,
          
        ]);
      
        
    }
}
