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
        Schema::create('shippment_adresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id', 0);
            $table->unsignedBigInteger('country_id');//->references('id')->on('countries');
            $table->foreignId('city_id')->references('id')->on('country_cities');
            $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->string('postal_code');
            // $table->string('posta_number');
            // $table->string('province_code')->nullable();
            // $table->string('province_name')->nullable();
            $table->string('addressLine1');
            // $table->string('addressLine2')->nullable();
            // $table->string('addressLine3')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('shippment_adresses');
    }
};
