<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('id_pedido');
            $table->dateTime('fecha');
            $table->longText('direccion');
            $table->dateTime('fecha_envio');
            $table->bigInteger('comprador')->unsigned();
            $table->integer('estatus');
            $table->bigInteger('items');
            $table->double('total');
            $table->foreign('comprador')->references('id_usuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedido');
    }
}
