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
        Schema::create('special_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id', 0);
            $table->string('title');
            $table->string('offer');
            $table->string('description')->nullable();
            $table->string('path');
            $table->boolean('status')->default(false);
            $table->timestamp('count_down');
            $table->integer('popup_type', 0)->default(1);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('special_products');
    }
};
