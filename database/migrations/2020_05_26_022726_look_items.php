<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LookItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('look_items', function (Blueprint $table) {
            $table->unsignedBigInteger('look_id');
            $table->unsignedBigInteger('item_detail_information_id');
            $table->tinyInteger('is_delete')->default(0);

            $table->primary(['look_id', 'item_detail_information_id']);
            $table->foreign('look_id')->references('id')->on('looks');
            $table->foreign('item_detail_information_id')->references('id')->on('item_detail_informations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('look_items');
    }
}
