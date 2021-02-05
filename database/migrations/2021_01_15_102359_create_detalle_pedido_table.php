<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->increments('id_detalle_pedido');
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('codigo_producto')->unsigned();
            $table->bigInteger('cantidad');
            $table->dateTime('fecha');
            $table->bigInteger('vendedor')->unsigned();
            $table->double('descuento');
            $table->timestamps();
            $table->foreign('id_pedido')->references('id_pedido')->on('pedido');
            $table->foreign('codigo_producto')->references('codigo')->on('producto');
            $table->foreign('vendedor')->references('id_usuario')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_pedido');
    }
}
