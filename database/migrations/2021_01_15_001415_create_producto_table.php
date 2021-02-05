<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('codigo');
            $table->string('SKU');
            $table->string('nombre');
            $table->string('marca');
            $table->double('precio');
            $table->longText('descripcion');
            $table->bigInteger('stock');
            $table->bigInteger('stock_anual');
            $table->bigInteger('categoria')->unsigned();
            $table->timestamps();
            $table->foreign('categoria')->references('id_categoria')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('producto');
    }
}
