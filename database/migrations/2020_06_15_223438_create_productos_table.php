<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('descripcion');
            $table->string('imagen');
            $table->unsignedInteger('tipoproducto_id');
            $table->unsignedInteger('clasifproducto_id');
            //cantidad de digitos, cantidad de decimales
            $table->decimal('precio', 8, 2);
            $table->boolean('estado');
            $table->timestamps();
            $table->foreign('tipoproducto_id')->references('id')->on('tipoproductos');
            $table->foreign('clasifproducto_id')->references('id')->on('clasifproductos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {

            $table->dropForeign('productos_tipoproducto_id_foreign');
            $table->dropForeign('productos_clasifproducto_id_foreign');
        });


        Schema::dropIfExists('productos');
    }
}
