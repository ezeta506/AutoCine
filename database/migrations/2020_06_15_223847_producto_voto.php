<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoVoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_voto', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('producto_id');
            $table->unsignedInteger('voto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::table('producto_voto', function (Blueprint $table) {

            $table->dropForeign('producto_voto_producto_id_foreign');
            $table->dropForeign('producto_voto_voto_id_foreign');
        });

        Schema::dropIfExists('producto_voto');
    }
}
