<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDetailInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_detail_informations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_detail_id');
            $table->string('size', 10);
            $table->double('price');
            $table->tinyInteger('is_delete')->default(0);
//            $table->unique(['item_detail_id', 'size']);
            $table->foreign('item_detail_id')->references('id')->on('item_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_detail_informations');
    }
}
