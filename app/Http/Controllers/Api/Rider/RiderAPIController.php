<?php

namespace App\Http\Controllers\Api\Rider;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class RiderAPIController extends Controller
{
    public function register(Request $request)
    {
        try{
            
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
                "message" => "Your rider have register successfully",
                "user" => $user,
                'access_token' =>$success['token']
                
            

            ];
            return response()->json($response);
    }catch (\Exception $e) {
     
        return $this->sendError($e->getMessage(), 401);
    }
}
       
       public function login(Request $request)
    {
        
        try{ 
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
                'remember_me' => 'boolean'
            ]);
            
            $credentials = request(['email', 'password']);
            if (!Auth::attempt($credentials))
                return response()->json([
                    'message' => 'Unauthorized'
                ], 401);

                
            $user = $request->user();

            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

            
            $business = [];
            if($user->hasRole('restaurant'))
            {
                $business = Business::where('user_id',$user->id)->first();
                // $menu = Menu::where('business_id',$business->id)->with('products')->get(); 
            }

            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->getRoleNames(),
                'access_token' => $tokenResult->accessToken,
                'business' => $business,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }catch (\Exception $e) {
     
            return $this->sendError($e->getMessage(), 401);
        }
        
     }
     
     public function sendResetLinkEmail(Request $request)
     {  
       $user = User::whereEmail($request->email)->first();
       

        // $this->validate($request, ['email' => 'required|email']);

        // $response = Password::broker()->sendResetLink(
        //     $request->only('email')
        // );
        // dd($response);
        // if ($response == Password::RESET_LINK_SENT) {
        //      return response()->json([
        //          'status'=>true,
        //          'message'=>'Reset link was sent successfully',
                  
        //      ]);
        // } else {
        //     return response()->json([
        //         'status'=>true,
        //         'message'=>'Reset link not sent',
                 
        //     ]);
            
        // }

     }
     public function logout(Request $request)
     {
      
        if (Auth::check()) {
            Auth::user()->AuthAccessToken()->delete();
         }
        
         return response()->json([
             'message' => 'Successfully logged out'
         ]);
     }
     
    public function user(Request $request)
    { 
       // $token = $request->bearerToken();
      // $userId = $this->extractIdFromToken($request->input('token'));
      $user = Auth::guard('api')->user();
      if (!$user) {
        return response()->json([
            'status' => true,
            'message' =>'User not found', 
        ]);
    }
    else{
        return response()->json([
            'status' => true,
            'message' =>'User  found', 
            'user' => $user,
        ]);
    }
        
        
        return response()->json($user);
    }
    
    public function settings(Request $request)
    {
      
    $input = $request->all();
   
    $userid = Auth::guard('api')->user()->id;
    
    $rules = array(
        'old_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    );
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
        $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
    } else {
        try {
            
            if ((Hash::check(request('old_password'), Auth::guard('api')->user()->password)) == false) {

                $arr = array("status" => 400, "message" => "Check your old password.", "data" => array());
            } else if ((Hash::check(request('new_password'), Auth::guard('api')->user()->password)) == true) {
                $arr = array("status" => 400, "message" => "Please enter a password which is not similar then current password.", "data" => array());
            } else {
                User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
            }
        } catch (\Exception $ex) {
            if (isset($ex->errorInfo[2])) {
                $msg = $ex->errorInfo[2];
            } else {
                $msg = $ex->getMessage();
            }
            $arr = array("status" => 400, "message" => $msg, "data" => array());
        }
    }
    return \Response::json($arr);
   }

}

