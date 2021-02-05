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
            $table->increments('id_detalle_servicio');
            $table->bigInteger('id_servicio')->unsigned();
            $table->dateTime('inicio');
            $table->dateTime('fin');
            $table->bigInteger('asesor')->unsigned();
            $table->bigInteger('cliente')->unsigned();
            $table->integer('estatus');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_servicio')->references('id_servicio')->on('servicio');
            $table->foreign('asesor')->references('id_usuario')->on('usuario');
            $table->foreign('cliente')->references('id_usuario')->on('usuario');
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
