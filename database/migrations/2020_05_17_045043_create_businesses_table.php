<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('slug')->nullable();
            $table->integer('zipcode')->nullable();
            $table->unsignedBigInteger('postal_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('business_email')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->longText('message')->nullable();
            $table->longText('description')->nullable();
            $table->string('hours')->nullable();
            $table->string('status')->nullable()->default(0);
            $table->string('claimed')->nullable()->default(0);
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
        Schema::dropIfExists('businesses');
    }
}
