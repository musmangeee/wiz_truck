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
                "name" => "Food Truck",
                "user_id" => "2", 
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