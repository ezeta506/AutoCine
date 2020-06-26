<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClasifproductoProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasifproducto_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clasifproducto_id');
            $table->unsignedInteger('producto_id');
            $table->timestamps();
            $table->foreign('clasifproducto_id')->references('id')->on('clasifproductos');
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
        Schema::table('clasifproducto_producto', function (Blueprint $table) {

            $table->dropForeign('clasifproducto_producto_clasifproducto_id_foreign');
            $table->dropForeign('clasifproducto_producto_producto_id_foreign');
        });

        Schema::dropIfExists('clasifproducto_producto');
    }
}
