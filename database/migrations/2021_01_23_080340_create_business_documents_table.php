<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_id');
            $table->string('license');
            $table->boolean('license_status', 2)->default(0);
            $table->string('liability_insurance');
            $table->boolean('liability_insurance_status', 2)->default(0);
            $table->string('health_permit');
            $table->boolean('health_permit_status', 2)->default(0);
            $table->string('void_check');
            $table->boolean('void_check_status', 2)->default(0);
            $table->string('w9_form');
            $table->boolean('w9_form_status', 2)->default(0);
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
        Schema::dropIfExists('business_documents');
    }
}
