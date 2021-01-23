<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notification= [
            [
                'type'    => 'created',
                'title'   => 'Order Created',
                'message' => 'Order created successfully',
               
            ],
            [
                'type'    => 'accepted',
                'title'   => 'Order Accepted',
                'message' => 'Order accepted successfully',
                
            ],
            [
                'type'       => 'assigned',
                'title'      => 'Order Assigned',
                'message'    => 'Order assigned successfully',
                
            ],
            [
                'type'       => 'deliver',
                'title'      => 'Order Deliver',
                'message'    => 'Order deliver successfully',
                
            ],
            [
                'type'       => 'cancel',
                'title'      => 'Order Cancelled',
                'message'    => 'Order cancel successfully',
            ],

        ];
        DB::table('notifications')->insert($notification);
    }
}