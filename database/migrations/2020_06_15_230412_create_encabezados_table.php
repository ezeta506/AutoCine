<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncabezadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encabezados', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fechaHoraVenta');
            $table->unsignedInteger('user_id');
            //cantidad de digitos, cantidad de decimales
            $table->decimal('impuesto', 8, 2);
            $table->decimal('total', 8, 2);
            $table->boolean('estado');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('encabezados', function (Blueprint $table) {

            $table->dropForeign('encabezados_user_id_foreign');
        });


        Schema::dropIfExists('encabezados');
    }
}
