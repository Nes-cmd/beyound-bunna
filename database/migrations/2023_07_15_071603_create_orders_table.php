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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id', 0);
            $table->unsignedBigInteger('shppment_adress_id', 0);
            $table->unsignedBigInteger('payment_id', 0);
            $table->string('orderId');
            $table->string('status')->default('received');
            $table->string('trcking_id')->default('unset');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('shppment_adress_id')->references('id')->on('shippment_adresses');
            $table->foreign('payment_id')->references('id')->on('transactions');
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
};
