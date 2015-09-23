<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function ($table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('width', 10);
            $table->integer('length', 10);
            $table->integer('user_id', 11);
            $table->string('login', 60);
            $table->string('password', 60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boats');
    }
}
