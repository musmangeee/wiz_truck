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
            ['name' => 'Burger','icon' => 'fas fa-hamburger','image' => 'food3.jpg'],
            ['name' => 'Burger','icon' => 'fas fa-hamburger','image' => 'food4.png'],
        ];

        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);

    }
}
