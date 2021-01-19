<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Image;
use App\Business;
use App\BusinessImage;
use App\BusinessCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    public function index($location = null)
    {
        $business = Business::with('categories','images')->paginate(10);
        return response()->json($business, 200);
    }
    public function ApiRegister(Request $request)
    {
             $validator = Validator::make($request->all(), [
            'first_name'    => 'required',
            'last_name' => 'required',
            'email'   => 'required|string|email|unique:users',
            'password'=> 'required',
            'business_name' => 'required',
            'url'     => 'required',
            'phone'   => 'required',
            'business_email' => 'required|string|email|unique:businesses',
            'description' => 'required',
            'role' => 'required|integer',
            'categories' => 'required|array|min:1'
        ]);
         
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        // unset($input['role']);
        $input = $request->all();
        $role = $input['role'];
        $input['name'] = $input['first_name'].' '.$input['last_name'];
        $input['password'] = bcrypt($input['password']);
        $input['device_token'] = $request['device_token'];
        $user = User::create($input);
        $user->assignRole($role);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $business = Business::create([
            'user_id' => $user ->id,  
            'name' => $request ->business_name,
            'url' => $request ->url, 
            'phone' => $request ->phone, 
            'business_email' => $request ->business_email,
            'description' => $request ->description , 
            'latitude' => $request ->latitude , 
            'longitude' => $request ->longitude , 
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
        else{
            
            $name = 'placeholder.png';
            $image = Image::create([
                'name' => $name,
            ]);
           
            $business_image = BusinessImage::create([
                'business_id' => $business->id,
                'image_id' => $image->id
            ]);
        }

        
        // Add Categories
        $response = [
            "status" => "200",
            "message" => "Your business have register successfully",
            "user" => $user,
            "business" => $business, 
            'access_token' =>$success['token']
        ];


        foreach($request->categories as $category)
        {

            $bc= new BusinessCategory();
            $bc->business_id = $business->id;
            $bc->category_id = $category;
            $bc->save();
        }

        return response()->json($response);

    }

    // ! Order Commission
    // public function commission($lat1, $lon1, $lat2, $lon2, $unit)
    public function nearbyDistance(Request $request)
    {
        $lat1 = $request->lat1;
        $lon1 = $request->lon1;
        $lat2 = $request->lat2;
        $lon2 = $request->lon2;
        $unit = $request->unit;

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
      
        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }

        // echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
       
    }


}
