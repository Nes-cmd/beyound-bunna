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
        Schema::create('shippment_rates', function (Blueprint $table) {
            $table->id();
            $table->string('product_type')->default('non-document');
            // $table->integer('country_id', 0);
            $table->foreignId('zone_id')->references('id')->on('zones');
            // $table->foreignId('city_id')->references('id')->on('country_cities')->onDelete('cascade');
            $table->float('size')->default(1);
            $table->float('price');
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
        Schema::dropIfExists('shippment_rates');
    }
};
