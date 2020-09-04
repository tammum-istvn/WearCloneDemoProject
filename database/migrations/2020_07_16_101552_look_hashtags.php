<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LookHashtags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('look_hashtags', function (Blueprint $table) {
            $table->unsignedBigInteger('look_id');
            $table->unsignedBigInteger('hashtag_id');

            $table->primary(['look_id', 'hashtag_id']);
            $table->foreign('look_id')->references('id')->on('looks')->onDelete('cascade');
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('look_hashtags');
    }
}
