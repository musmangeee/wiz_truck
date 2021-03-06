<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;


use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\Console\Input\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    { //dd($driver);
        try {
            $user = Socialite::driver($driver)->user();
            // return response()->json($user);
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser                    = new User;
            $newUser->provider          = $driver;
            $newUser->provider_id       = $user->getId();
            $newUser->name              = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->avatar            = $user->getAvatar();
            $newUser->save();

            auth()->login($newUser, true);
        }


        return redirect($this->redirectPath());
    }
    
    // ! Mobile Response API

    public function mobileAuthRegister(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'name'  =>  'required|string',
            'email' => 'required|email|unique:users,email',
            'role'  =>  'required|integer'
        ]);
       
        if ($validator->fails()) {
           return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        $role = $input['role'];
        //$user->assignRole(3);
        unset($input['role']);

            $user = User::create($input);   
            $user->assignRole($role);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return response()->json([
                'success' => $success,
                'role' => $user->getRoleNames(),
                'deviceToken' => $user->device_token
            ]);
            // return response()->json(['success' => $success]);
   
        }
    

    public function mobileResponse(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
        ]);
       
        if ($validator->fails()) {
           return response()->json(['error' => $validator->errors()], 401);
        }

            $user = User::where('email' , $request->email )->first();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            
            return response()->json([
                'success' => $success,
                'role' => $user->getRoleNames(),
                'deviceToken' => $user->device_token
            ]);

        }
       
    
}
