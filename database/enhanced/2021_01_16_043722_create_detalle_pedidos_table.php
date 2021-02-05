<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id_detalle_pedido');
            $table->bigInteger('id_pedido')->unsigned();
            $table->bigInteger('codigo_producto')->unsigned();
            $table->bigInteger('cantidad');
            $table->dateTime('fecha');
            $table->bigInteger('vendedor')->unsigned();
            $table->double('descuento');
            $table->timestamps();
            $table->softDeletes();$table->engine = env('DB_ENGINE');
            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');
            $table->foreign('codigo_producto')->references('codigo')->on('productos');
            $table->foreign('vendedor')->references('id_usuario')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_pedidos');
    }
}
