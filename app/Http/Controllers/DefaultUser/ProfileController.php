<?php

namespace App\Http\Controllers\DefaultUser;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Helper\HelperController;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function setting()
    {
        //$helper = new HelperController();
      //  $data = $helper->main_menu_data();
       
        return view('backend.profile.edit');
    }
    public function update(Request $request, $id)
    {
       dd('views');
      
        
    }
    

}
