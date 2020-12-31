<?php

use Illuminate\Database\Seeder;

class ProductOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('product_orders')->truncate(); 

        $product_orders = [
            [
                "id" => 1,
                "product_id" => 1,
                "order_id" => 2,
                "discount" => 12,
                "quantity" => 2 ,
               

            ],
            [
                "id" => 2,
                "product_id" => 1,
                "order_id" => 3,
                "discount" => 122,
                "quantity" => 3,
               
            ],
            [
                "id" => 3,
                "product_id" => 1,
                "order_id" => 2,
                "discount" => 12,
                "quantity" => 2 ,
               
            ],
            [
                "id" => 4,
                "product_id" => 2,
                "order_id" => 4,
                "discount" => 12,
                "quantity" => 4,
               
            ],
        ];
       
        \Illuminate\Support\Facades\DB::table('product_orders')->insert($product_orders);
    }
}

