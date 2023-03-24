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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_category_id', 0);
            $table->unsignedBigInteger('sub_category_id', 0);
            // $table->unsignedBigInteger('productable_id', 0);//another products table for details of product
            // $table->string('productable_type');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->double('price');
            $table->double('discount')->default(0.0);
            $table->integer('instock');
            $table->float('size');
            $table->integer('ammount_in_stock');
            $table->string('description');
            $table->text('photos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('main_category_id')->references('id')->on('main_categories');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
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
        Schema::dropIfExists('products');
    }
};
