<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_detail_information_id');
            $table->unsignedBigInteger('look_id')->nullable();
            $table->integer('quantity');
            $table->double('shipping_fee');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('item_detail_information_id')->references('id')->on('item_detail_informations');
            $table->foreign('look_id')->references('id')->on('looks');
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
        Schema::dropIfExists('order_items');
    }
}
