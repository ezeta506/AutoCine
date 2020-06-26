<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('sinopsis');
            $table->string('imagen');
            $table->unsignedInteger('clasificacion_id');
            $table->boolean('estado');
            $table->timestamps();
            //ralacion con clasificacions
            $table->foreign('clasificacion_id')->references('id')->on('clasificacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peliculas', function (Blueprint $table) {

            $table->dropForeign('peliculas_clasificacion_id_foreign');
            $table->dropColumn('clasificacion_id');
        });



        Schema::dropIfExists('peliculas');
    }
}
