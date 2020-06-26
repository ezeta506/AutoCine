<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarteleraEncabezado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartelera_encabezado', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cartelera_id');
            $table->unsignedInteger('encabezado_id');
            $table->integer('cantidad');
            $table->foreign('cartelera_id')->references('id')->on('carteleras');
            $table->foreign('encabezado_id')->references('id')->on('encabezados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cartelera_encabezado', function (Blueprint $table) {

            $table->dropForeign('cartelera_encabezado_cartelera_id_foreign');
            $table->dropForeign('cartelera_encabezado_encabezado_id_foreign');
        });

        Schema::dropIfExists('cartelera_encabezado');
    }
}
