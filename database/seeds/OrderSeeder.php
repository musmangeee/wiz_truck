<?php

use Illuminate\Database\Seeder;
use App\Order;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('orders')->truncate();
          
        $orders = [
            [
                "id" => 1,
                "business_id" => 1,
                "user_id" => 2,
                "address" => "DHA Phase 5",
                "latitude" => "31.4625° N",
                "longitude"=>"74.4086° E",
                "order_date" => \Carbon\Carbon::parse('2000-01-01'),
                'order_type'=>"Delivery",
                "description"   => "abc",
                "total"=>"1212",
                "status" => "pending",
                "payment_method"=>"1",
                "payment_status"=>"0",
           

            ],
            [
                "id" => 2,
                "business_id" => 2,
                "user_id" => 3,
                "address" => "DHA Phase 7",
                "latitude" => "31.4647° N",
                "longitude"=>"74.4936° E",
                "order_date" => \Carbon\Carbon::parse('2000-01-01'),
                'order_type'=>"Pickup",
                "description"   => "abc",
                "total"=>"1212",
                "status" => "pending",
                "payment_method"=>"1",
                "payment_status"=>"0",
            ],
            [
                "id" => 3,
                "business_id" => 1,
                "user_id" => 3,
                "address" => "DHA Phase 8",
                "latitude" => "31.4899° N",
                "longitude"=>"74.4496° E",
                "order_date" => \Carbon\Carbon::parse('2000-01-01'),
                'order_type'=>"Pickup",
                "description"   => "abc",
                "total"=>"1212",
                "status" => "pending",
                "payment_method"=>"1",
                "payment_status"=>"0",
            ],
            [
                "id" => 4,
                "business_id" => 3,
                "user_id" => 3,
                "address" => "DHA Phase 3",
                "latitude" => "31.4749° N",
                "longitude"=>"74.3734° E",
                "order_date" => \Carbon\Carbon::parse('2000-01-01'),
                'order_type'=>"Delivery",
                "description"   => "abc",
                "total"=>"1212",
                "status" => "pending",
                "payment_method"=>"1",
                "payment_status"=>"0",
            ],
        ];
       
        \Illuminate\Support\Facades\DB::table('orders')->insert($orders);
    }
}
