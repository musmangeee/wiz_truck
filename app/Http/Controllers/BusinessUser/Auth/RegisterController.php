<?php

namespace App\Http\Controllers\BusinessUser\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Business;
use Validator;
use Hash;
use Redirect;
use Auth;
use File;
use App\Image;
use App\BusinessImage;

use App\BusinessCategory;
class RegisterController extends Controller
{
    public function index()
    {
       
        return view('business.index');
    }
    public function register(Request $request)
    {
       $business = array();

      $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'name' => 'required',
            'url' => 'required|url',
            'zipcode' => 'required',
            'phone' => 'required',
            'categories' => 'required',
            'address' => 'required',
            'business_email' => 'required',
           
        ]);
           


    

        // dd($request -> all());
        if($validator->fails()) {
           
            return Redirect::back()->withErrors($validator);
        }
     
        $user  = new User() ; 
        $user -> name = $request-> name ;
        $user -> email = $request-> email ;
        $user -> password = Hash::make($request-> password);
        $user -> save();
        // dd('hi');
        
        
          
        
        $business = Business::create([
            'user_id' => $user ->id,  
  
            'name' => $request -> business_name,
            'url' => $request -> url, 
            'phone' => $request -> phone, 
            'address' => $request -> address , 
            'business_email' => $request -> business_email,
            'latitude' =>  $request -> latitude, 
            'longitude' => $request -> longitude ,
            'message' => $request -> message,  
            'description' => $request -> description , 
            'hours' => $request -> hours , 
            'status'  => $request -> status,  
            'claimed' =>  $request -> claimed ,
            'city' => $request -> city,
            'state' => $request -> state ,  
            'zipcode' => $request -> zipcode , 

        ]);
         

     

        foreach($request->categories as $category)
        {
         
            
            $bc= new BusinessCategory();
            $bc->business_id = $business->id;
            $bc->category_id = $category;
            $bc->save();
        }
        

       
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
               
                $name = time() . $file->getClientOriginalName();
               $file->move('public\business_images', $name);
            
             
                 $image = Image::create([
                    'name' => $name,
                ]);
               
                $business_image = BusinessImage::create([
                    'business_id' => $business->id,
                    'image_id' => $image->id
                ]);
              

            }
        }


      
        Auth::loginUsingId($user->id, $remember = true);
        $user->assignRole(3);
        

        return redirect()->route('individual.business.index');
        // dd($bussinesscreate);
    }
       

}
