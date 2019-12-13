<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoutiquesProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boutiques', function (Blueprint $table) {
            $table->text("str_products")->nullable();
            $table->text("str_products_all")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boutiques', function (Blueprint $table) {
            $table->dropColumn("str_products");
            $table->dropColumn("str_products_all");
        });
    }
}
