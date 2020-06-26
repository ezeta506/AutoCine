<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartelerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteleras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaHora');
            $table->unsignedInteger('pelicula_id');
            $table->unsignedInteger('ubicacion_id');
            $table->boolean('estado');
            $table->timestamps();
            //ralacion con clasificacions
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
            //ralacion con ubicaciones
            $table->foreign('ubicacion_id')->references('id')->on('ubicacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carteleras', function (Blueprint $table) {

            $table->dropForeign('carteleras_pelicula_id_foreign');
            $table->dropColumn('pelicula_id');
            $table->dropForeign('carteleras_ubicacion_id_foreign');
            $table->dropColumn('ubicacion_id');
        });


        Schema::dropIfExists('carteleras');
    }
}
