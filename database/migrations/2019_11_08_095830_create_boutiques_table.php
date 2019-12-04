<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutiques', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('name')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('languages')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('weechat')->nullable();
            $table->longText('full_description')->nullable();
            $table->text('images')->nullable();
            $table->longText('trading_house_image')->nullable();
            $table->boolean('is_hit')->nullable();
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
        Schema::dropIfExists('boutiques');
    }
}
