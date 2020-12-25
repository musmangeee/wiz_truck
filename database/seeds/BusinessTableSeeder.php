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
                "latitude" => 31.57015746226406, 
                 "longitude" => 74.413482053698,
                "phone" => "+233201660218",
                "url" => "null",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "null",
                'business_email' => "null",
                'city' => 'null',
                'state' => 'Punjab',
               
                
            ],
            [
                "name" => "Fazal Sweets & Bakers",
                "user_id" => "1", 
                "latitude" => 31.542122232874252, 
                "longitude" =>74.31827325979195,
                "phone" => "+233201660218",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "null",
                'business_email' => "null",
                'city' => 'null',
                'state' => 'Punjab',

            ],
            [
                "name" => "Chandni Chowk Restaurant",
                "user_id" => "1", 
                "latitude" => 31.504879933985713, 
                 "longitude" =>74.35726815469847,
                 "phone" => "+233201660218",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "null",
                'business_email' => "null",
                'city' => 'null',
                'state' => 'Punjab',
            ],
           
            [
                "name" => "Turkish Restaurant",
                "user_id" => "1", 
                "latitude" => 31.51188454319372,
                "longitude" =>74.35120940198539,
                "phone" => "+233201660218",
                "url" => "null",
                "address" => "null",
                "zipcode" => "00001",
                "phone" => "null",
                'address' => "null",
                'business_email' => "null",
                'city' => 'null',
                'state' => 'Punjab',
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