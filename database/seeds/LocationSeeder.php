<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Location::create([
            'user_id' => '4',
            'latitude' => 31.541236763978112, 
            'longitude' => 74.31386862539271
        ]);
      
        Location::create([
       
            'user_id' => '4',
        'latitude' => 31.542096277164795, 
        'longitude' => 74.31837473651262
       
        ]);

        Location::create([
            'user_id' => '4',
            'latitude' => 31.539664041491292, 
            'longitude' => 74.31887641132089
        ]);
    }
}
