<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutiqueProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutique_products', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('boutique_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('price_from')->nullable();
            $table->integer('price_to')->nullable();
            // $table->integer('price_from_dollar')->nullable();
            // $table->integer('price_to_dollar')->nullable();
            // $table->integer('price_from_rub')->nullable();
            // $table->integer('price_to_rub')->nullable();
            

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
        Schema::dropIfExists('boutique_products');
    }
}
