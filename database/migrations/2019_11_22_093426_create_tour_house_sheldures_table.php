<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourHouseShelduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_house_sheldures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('dates')->nullable();
            $table->integer('price')->nullable();
            $table->string('times')->nullable();
            $table->string('periods')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('tour_house_id')->nullable();
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('tour_house_sheldures');
    }
}
