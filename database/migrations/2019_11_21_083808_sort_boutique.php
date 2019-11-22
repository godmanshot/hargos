<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SortBoutique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boutiques', function (Blueprint $table) {
            $table->float("popular")->nullable();
            $table->float("top")->nullable();
            $table->float("stock")->nullable();
            $table->float("new")->nullable();
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
            $table->dropColumn("popular");
            $table->dropColumn("top");
            $table->dropColumn("stock");
            $table->dropColumn("new");
        });
    }
}
