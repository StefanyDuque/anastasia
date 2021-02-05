<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->string('SKU');
            $table->string('nombre');
            $table->string('marca');
            $table->double('precio');
            $table->longText('descripcion');
            $table->bigInteger('stock');
            $table->bigInteger('stock_anual');
            $table->bigInteger('categoria')->unsigned();
            $table->timestamps();
            $table->softDeletes();$table->engine = env('DB_ENGINE');
            $table->foreign('categoria')->references('id_categoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
