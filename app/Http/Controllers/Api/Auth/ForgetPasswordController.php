<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{

    
    public function forgot_password() {
  
        $credentials = request()->validate(['email' => 'required|email']);

        $password =Password::sendResetLink($credentials);
      

        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
    }
