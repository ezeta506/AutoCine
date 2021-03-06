<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedInteger('rol_id');
            $table->boolean('estado');
            $table->rememberToken();
            #created_at updated_at
            $table->timestamps();
            $table->foreign('rol_id')->references('id')->on('rols');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign('users_rol_id_foreign');

        });

        Schema::dropIfExists('users');
    }
}
