<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PeliculaVoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelicula_voto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pelicula_id');
            $table->unsignedInteger('voto_id');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
            $table->foreign('voto_id')->references('id')->on('votos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelicula_voto', function (Blueprint $table) {

            $table->dropForeign('pelicula_voto_pelicula_id_foreign');
            $table->dropForeign('pelicula_voto_voto_id_foreign');
        });

        Schema::dropIfExists('pelicula_voto');
    }
}
