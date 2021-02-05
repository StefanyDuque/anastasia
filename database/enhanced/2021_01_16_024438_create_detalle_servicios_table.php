<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleServiciosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_servicios', function (Blueprint $table) {
            $table->bigIncrements('id_detalle_servicio');
            $table->bigInteger('id_servicio')->unsigned();
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->bigInteger('asesor')->unsigned();
            $table->bigInteger('cliente')->unsigned();
            $table->integer('estatus');
            $table->timestamps();
            $table->softDeletes();$table->engine = env('DB_ENGINE');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
            $table->foreign('asesor')->references('id_usuario')->on('usuarios');
            $table->foreign('cliente')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_servicios');
    }
}
