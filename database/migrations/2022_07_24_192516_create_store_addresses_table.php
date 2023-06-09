<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('country_id');
            $table->string('postal_code');
            $table->string('posta_number');
            $table->string('city_name');
            $table->string('province_code')->nullable();
            $table->string('province_name')->nullable();
            $table->string('addressLine1');
            $table->string('addressLine2')->nullable();
            $table->string('addressLine3')->nullable();
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
        Schema::dropIfExists('store_addresses');
    }
};
