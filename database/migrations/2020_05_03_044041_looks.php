<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Looks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('looks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 50);
            $table->text('description');
            $table->string('picture');
            $table->enum('gender', ['men', 'women', 'kids']);
            $table->string('height', 5)->nullable();
            $table->integer('age')->length(10)->unsigned()->nullable();
            
            $table->tinyInteger('is_delete')->default(0);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('looks');
    }
}
