<?php

use App\Ridderlogs;
use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Ridderlogs::create([
             'user_id' => '4',
             'order_id' => '1',
             'commision' => '20%',
             'seen' => '0',
             'status' => '1'
        ]);
        Ridderlogs::create([
            'user_id' => '4',
            'order_id' => '1',
            'commision' => '20%',
            'seen' => '1',
            'status' => '2'
         ]);
            Ridderlogs::create([
                'user_id' => '4',
                'order_id' => '1',
                'commision' => '20%',
                'seen' => '0',
                'status' => '3'
          ]);
            Ridderlogs::create([
                'user_id' => '4',
                'order_id' => '1',
                'commision' => '20%',
                'seen' => '1',
                'status' => '1'
            ]);

    }
}
