<?php

use App\City;
use App\Business;
use App\Category;
use App\BusinessCategory;
use Illuminate\Database\Seeder;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('businesses')->truncate();
        $businesses = [
          
            [
                "name" => "Cakes and Bakes",
                "user_id" => "1", 
                "latitude" => "31.4749° N", 
                 "longitude" => "74.3734° E",
                "phone" => "+233201660218",
                "url" => "null",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "DHA Phase 8",
                'business_email' => "null",
              
               
                
            ],
            [
                "name" => "Fazal Sweets & Bakers",
                "user_id" => "1", 
                "latitude" => "31.5204° N", 
                "longitude" =>"74.3587° E",
                "phone" => "+233201660218",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "DHA Phase 3",
                'business_email' => "null",
            

            ],
            [
                "name" => "Chandni Chowk Restaurant",
                "user_id" => "1", 
                "latitude" => "30.7145° N", 
                 "longitude" =>"76.7149° E",
                 "phone" => "+233201660218",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "DHA Phase 5",
                'business_email' => "null",
                
            ],
           
            [
                "name" => "Turkish Restaurant",
                "user_id" => "1", 
                "latitude" => "31.4715° N",
                "longitude" =>"74.4584° E",
                "phone" => "+233201660218",
                "url" => "null",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "DHA Phase 6",
                'business_email' => "null",
               
            ],
           
       
           
        ];

        foreach ($businesses as $business) {
            $business['slug'] = strtolower(str_replace(' ', '-', preg_replace("/[^ \w]+/", "", $business['name'])));
            $business['slug'] = strtolower(str_replace(' ', '-', preg_replace("/[^ \w]+/", "", $business['name'])) );
            $business['slug'] = strtolower(str_replace(' ', '-', preg_replace("/[^ \w]+/", "", $business['name'])));
            $business =  Business::create($business);
            $categories = new BusinessCategory();
            $categories -> business_id = $business->id;
            $categories -> category_id = rand(1, sizeof(Category::all()));
            $categories -> save();
        }
    }
}