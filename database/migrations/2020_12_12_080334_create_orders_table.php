<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->unsignedBigInteger('user_id');
            $table->string('order_date');
            $table->string('order_type');
            $table->string('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('description');
            $table->float('total');
            $table->string('status')->default("pending");
            $table->string('payment_method');
            $table->string('rider_earning');
            $table->string('foodtruck_earning');
            $table->string('service_charges');
            $table->string('tip');
            $table->string('tax_charges');
            $table->string('payment_id')->nullable();
            $table->integer('payment_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
