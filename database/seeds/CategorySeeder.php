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
           
        ];

        \Illuminate\Support\Facades\DB::table('categories')->insert($categories);

    }
}
