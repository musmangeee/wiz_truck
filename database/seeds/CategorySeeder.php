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
            ['name' => 'Burger','icon' => 'fas fa-hamburger','image' => 'food2.jpg'],
            ['name' => 'Food','icon' => 'fa fa-utensils','image' => 'food1.jpg'],
            ['name' => 'Pizza','icon' => 'fas fa-pizza-slice','image' => 'food.jpg'],
            ['name' => 'Restaurant','icon' => 'fa fa-home','image' => 'food4.png'],
            ['name' => 'Industry','icon' => 'fa fa-industry','image' => 'food.jpg'],
            ['name' => 'Mining','icon' => 'fa fa-hammer','image' => 'food1.jpg'],
            ['name' => 'Oil & Gas','icon' => 'fas fa-oil-can','image' => 'food2.jpg'],
            ['name' => 'Pizza','icon' => 'fas fa-farm','image' => 'food3.jpg'],
        ];

        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);

    }
}
