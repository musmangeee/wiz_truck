<?php

namespace App\Http\Controllers\BusinessUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view ('backend.business.Auth.login');
    }

    public function register()
    {

        $categories = Category::all();

        return view ('backend.business.Auth.signup' , compact('categories'));
    }

    public function Ridderlogin()
    {
        return view ('backend.business.Auth.ridderlogin');
    }

    public function Ridderregister()
    {
        return view ('backend.business.Auth.riddersignup');
    }


    

}
