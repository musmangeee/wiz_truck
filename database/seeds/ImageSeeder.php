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
                'name'=>'16110631321589330486822.jpg'
            ],
           
            

        
        ];
        foreach ($images as $image) {
            $image = Image::create([
                'name' => $image['name'],
                
            ]);
        }
    }
}
