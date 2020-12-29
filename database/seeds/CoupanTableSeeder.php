<?php

use Illuminate\Database\Seeder;
use App\Coupon;

class CoupanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => '30'
        ]);

        Coupon::create([
            'code' => 'DEX123',
            'type' => 'percent',
            'value' => '50'
        ]);

    }
}
