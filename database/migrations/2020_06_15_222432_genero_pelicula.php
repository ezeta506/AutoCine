<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GeneroPelicula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_pelicula', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('genero_id');
            $table->unsignedInteger('pelicula_id');
            $table->timestamps();
            //ralacion con clasificacions
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('genero_pelicula', function (Blueprint $table) {

            $table->dropForeign('genero_pelicula_genero_id_foreign');
            $table->dropForeign('genero_pelicula_pelicula_id_foreign');
        });

        Schema::dropIfExists('genero_pelicula');
    }
}
