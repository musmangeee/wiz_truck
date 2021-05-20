<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->truncate();

        $categories = [
            ['name' => 'BBQ','icon' => 'fas fa-hamburger','image' => 'food2.jpg'],
            ['name' => 'Hamburgers','icon' => 'fas fa-hamburger','image' => 'food3.jpg'],
            ['name' => 'Hot dogs','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Coffee Trucks','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Smoothie / Healthy Drink Trucks ','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Sandwiches','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Sliders','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Cupcakes and desserts','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Street tacos and burritos','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Sushi','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Lobster rolls','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Mediterranean menus / Gyros','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Crepes with special toppings','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Vietnamese food','icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Pizza' , 'icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Ice cream and soft serve ' , 'icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Shaved ice / Italian ice' , 'icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Shaved ice / Italian ice' , 'icon' => 'fas fa-hamburger','image' => 'food4.png'],
            ['name' => 'Indian food' , 'icon' => 'fas fa-hamburger','image' => 'food4.png'],
        ];

        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);

    }
}
