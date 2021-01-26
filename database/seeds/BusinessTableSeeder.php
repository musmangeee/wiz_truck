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
                "user_id" => "2", 
                "latitude" => 31.422071, 

          
            [
                "name" => "Food Truck",
                "user_id" => "5", 
                "latitude" => 31.421724,
                "longitude" =>74.285716,

                "phone" => "+233201660218",
                "url" => "null",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",

                'address' => "Military Accounts Chs, Lahore, Punjab......",
                'business_email' => "null",
              
               
                
            ],
            // [
            //     "name" => "Fazal Sweets & Bakers",
            //     "user_id" => "1", 
            //     "latitude" => 31.422003, 
            //     "longitude" =>74.285266,
            //     "phone" => "+233201660218",
            //     "address" => "null",
            //     "zipcode" => "00001",
            //     "phone" => "null",
            //     'address' => "DHA Phase 3",
            //     'business_email' => "null",
            

            // ],
            // [
            //     "name" => "Food Truck",
            //     "user_id" => "5", 
            //     "latitude" => 31.421724,
            //     "longitude" =>74.285716,
            //     "phone" => "+233201660218",
            //     "url" => "null",
            //     "address" => "null",
            //     "zipcode" => "00001",
            //     "phone" => "null",
            //     'address' => "USA",
            //     'business_email' => "foodtruck@gmail.com",
               
            // ],
            // [
            //     "name" => "Chandni Chowk Restaurant",
            //     "user_id" => "1", 
            //     "latitude" => 31.421939, 
            //      "longitude" =>74.285566,
            //      "phone" => "+233201660218",
            //     "address" => "null",
            //     "zipcode" => "00001",
            //     "phone" => "null",
            //     'address' => "DHA Phase 5",
            //     'business_email' => "null",
                
            // ],
           
            // [
            //     "name" => "Turkish Restaurant",
            //     "user_id" => "1", 
            //     "latitude" => 31.421724,
            //     "longitude" =>74.285716,
            //     "phone" => "+233201660218",
            //     "url" => "null",
            //     "address" => "null",
            //     "zipcode" => "00001",
            //     "phone" => "null",
            //     'address' => "DHA Phase 6",
            //     'business_email' => "null",
               
            // ],
            

           
       
           

                'address' => "USA",
                'business_email' => "foodtruck@gmail.com",
               
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