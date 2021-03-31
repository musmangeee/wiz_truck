<?php

use App\BusinessImage;
use Illuminate\Database\Seeder;

class BusinessImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        Illuminate\Support\Facades\DB::table('business_images')->truncate();
        
        $businessImages= [
            [
                'business_id' => '1',
                'image_id' =>'1'
            ],
            [
                'business_id' => '2',
                'image_id' =>'2'
            ], 
            [
                'business_id' => '3',
                'image_id' =>'3'
            ],
            [
                'business_id' => '4',
                'image_id' =>'4'
            ],
          
        ];
        foreach ($businessImages as $businessImage) {
            $businessImage = BusinessImage::create([
                'business_id' => $businessImage['business_id'],
                'image_id' => $businessImage['image_id']
            ]);
        }

 }
}
