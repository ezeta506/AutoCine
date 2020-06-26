<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncabezadoProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encabezado_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('encabezado_id');
            $table->unsignedInteger('producto_id');
            $table->integer('cantidad');
            $table->foreign('encabezado_id')->references('id')->on('encabezados');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('encabezado_producto', function (Blueprint $table) {

            $table->dropForeign('encabezado_producto_encabezado_id_foreign');
            $table->dropForeign('encabezado_producto_producto_id_foreign');
        });

        Schema::dropIfExists('encabezado_producto');
    }
}
