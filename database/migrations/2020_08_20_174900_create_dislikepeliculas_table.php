<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDislikepeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dislikepeliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pelicula_id')->unsigned();
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
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
        Schema::table('dislikepeliculas', function (Blueprint $table) {
            $table->dropForeign('dislikepeliculas_pelicula_id_foreign');
            $table->dropColumn('pelicula_id');
        });


        Schema::dropIfExists('dislikepeliculas');
    }
}
