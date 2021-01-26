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
