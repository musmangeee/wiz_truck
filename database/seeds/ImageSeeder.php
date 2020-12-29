<?php

use Illuminate\Database\Seeder;
use App\Image;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images=[
           
            [
                'name'=>'16087294711513602185214.jpg'
            ],
            [
                'name'=>'160871517583f5cdc0bee3484f475ba965d1087223.jpg'
            ],
            [
                'name'=>'1608813544chick-fil-restaurant.jpg'
            ],
            [
                'name'=>'160872670183f5cdc0bee3484f475ba965d1087223.jpg'
            ],
            

        
        ];
        foreach ($images as $image) {
            $image = Image::create([
                'name' => $image['name'],
                
            ]);
        }
    }
}
