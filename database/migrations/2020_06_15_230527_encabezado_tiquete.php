<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncabezadoTiquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encabezado_tiquete', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tiquete_id');
            $table->unsignedInteger('encabezado_id');
            $table->integer('cantidad');
            $table->foreign('tiquete_id')->references('id')->on('tiquetes');
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
        Schema::table('encabezado_tiquete', function (Blueprint $table) {

            $table->dropForeign('encabezado_tiquete_tiquete_id_foreign');
            $table->dropForeign('encabezado_tiquete_encabezado_id_foreign');
        });

        Schema::dropIfExists('encabezado_tiquete');
    }
}
