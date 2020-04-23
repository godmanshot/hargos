<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('images')->nullable();
            $table->string('background')->nullable();
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->integer('order')->nullable();
            $table->bigInteger('category_id')->nullable();
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
        Schema::dropIfExists('category_stocks');
    }
}
