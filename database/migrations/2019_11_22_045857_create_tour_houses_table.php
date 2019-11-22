<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_houses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('house_name')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->text('images')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_name_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('phone_name_2')->nullable();
            $table->text('tour_content')->nullable();
            $table->text('tour_description')->nullable();
            $table->string('coordinates')->nullable();

            $table->bigInteger('country_id')->nullable();
            $table->bigInteger('city_id')->nullable();

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
        Schema::dropIfExists('tour_houses');
    }
}
