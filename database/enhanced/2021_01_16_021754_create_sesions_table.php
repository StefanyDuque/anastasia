<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesiones', function (Blueprint $table) {
            $table->bigIncrements('id_sesion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_final');
            $table->bigInteger('id_usuario')->unsigned();
            $table->timestamps();
            $table->softDeletes();$table->engine = env('DB_ENGINE');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sesions');
    }
}
