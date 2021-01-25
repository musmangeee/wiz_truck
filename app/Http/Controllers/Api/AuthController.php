<?php

namespace App\Http\Controllers\Api;

use App\User;
use Validator;
use App\Business;
use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $successStatus = 200;
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {



        $validator = Validator::make($request->all(), [
            // 'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'first_name'    => 'required',
            'last_name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        unset($input['role']);
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        if ($request->role) {
            $user->assignRole($request->role);
        }
        //dd($user->getRoleNames());



        return response()->json(['success' => $success, 'role' => $user->getRoleNames()], $this->successStatus);
    }
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
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
 $dd = User::where('email',$request->email)->update( [ 'device_token' => $request->device_token ]);

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

       $id =  $user->id;
       if($user->hasRole('rider')){
       $location = Location::where('user_id',$id)->first();
       if ($location != null) {
           $location->update([
               'latitude' => $request-> latitude,
               'longitude' => $request-> longitude
           ]);
       }
       else
       {
           $location = new Location();
           $location->user_id = $id;
           $location->latitude = $request->latitude;
           $location->longitude = $request->longitude;
           $location->save();
       }
       }
     

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
           
            'role' => $user->getRoleNames(),
            'access_token' => $tokenResult->accessToken,
            'business' => $business,
            'device_token' => $request->device_token,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

  
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function change_password(Request $request, $id)
    {
       
            $user = User::where('id',$id)-> first();
            //$request->old_password = bcrypt($request->old_password);
            if($user)
            {
                if(\Hash::check($request->old_password, $user->password))
                {
                        $user->password = bcrypt($request->new_password);
                        $user->save();
                        return response()->json(['message'=>'Password changed successfully','status' => 'true'], 201);
                }
                else
                {
                    return response()->json(['message'=>'Incorrect old password','status'=>'false'], 400);
                }
            }
            else
            {
                return response()->json(['message'=>'user not found','status' => 'false'], 400);
            }
        

    }
    
}