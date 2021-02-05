<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_pedido');
            $table->dateTime('fecha');
            $table->longText('direccion');
            $table->dateTime('fecha_envio');
            $table->bigInteger('comprador')->unsigned();
            $table->integer('estatus');
            $table->bigInteger('items');
            $table->double('total');
            $table->softDeletes();$table->engine = env('DB_ENGINE');
            $table->foreign('comprador')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedidos');
    }
}
