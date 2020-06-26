<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarteleraTiquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartelera_tiquete', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cartelera_id');
            $table->unsignedInteger('tiquete_id');
            $table->foreign('cartelera_id')->references('id')->on('carteleras');
            $table->foreign('tiquete_id')->references('id')->on('tiquetes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartelera_tiquete', function (Blueprint $table) {

            $table->dropForeign('cartelera_tiquete_cartelera_id_foreign');
            $table->dropForeign('cartelera_tiquete_tiquete_id_foreign');
        });

        Schema::dropIfExists('cartelera_tiquete');
    }
}
