<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'SANDWICHES',
                'business_id' => '3'
            ],
            [
                'name' => 'BIRYANI',
                'business_id' => '1'
            ],
            [
                'name' => 'PALAO',
                'business_id' => '1'
            ],
            [
                'name' => 'SHAWARMA',
                'business_id' => '1'
            ],
            [
                'name' => 'ZINGER BURGERS1',
                'business_id' => '2'
            ],
            [
                'name' => 'SANDWICHES1',
                'business_id' => '2'
            ],
            [
                'name' => 'BURGERS',
                'business_id' => '2'
            ],
            [
                'name' => 'COLD COKE',
                'business_id' => '2'
            ],
            [
                'name' => 'BOTTLE',
                'business_id' => '2'
            ],
            [
                'name' => 'SANDWICH1',
                'business_id' => '2'
            ],
            [
                'name' => 'CHICKEN',
                'business_id' => '4'
            ],
            [
                'name' => 'BURGER',
                'business_id' => '1'
            ],
           
            
        ];

        foreach ($menus as $menu) {
            $menu = Menu::create([
                'name' => $menu['name'],
                'business_id' => $menu['business_id']


            ]);
        }
    }
}
