<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WatchShop extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('watchid');
            $table->string('name');
            $table->string('price');
            $table->string('image');
            $table->timestamp('created_at');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('watchids');
            $table->string('watchname');
            $table->string('price');
            $table->string('quantity');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamp('created_at');
        });

        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('feedback');
            $table->timestamp('created_at');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watches');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('feedback');
    }
}
