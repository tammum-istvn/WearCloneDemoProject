<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50)->nullable();
            $table->enum('account_type', ['individual','shop']);
            $table->date('date_of_birth')->nullable();
            $table->string('picture')->nullable();
            $table->text('introduction')->nullable();
            $table->string('phone', 15)->nullable();
            $table->enum('gender', ['men', 'women', 'kids'])->nullable();
            $table->string('height', 8)->nullable();
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
        Schema::dropIfExists('users');
    }
}
