<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id_usuario');
            $table->string('username');
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('identificacion');
            $table->bigInteger('telefono');
            $table->string('correo');
            $table->date('fecha_nacimiento');
            $table->integer('estatus');
            $table->integer('rol');
            $table->timestamps();
            $table->softDeletes();$table->engine = env('DB_ENGINE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
