<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('id_categoria');
            $table->string('slug');
            $table->string('nombre');
            $table->bigInteger('categoria_padre')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('categoria_padre')->references('id_categoria')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categorias');
    }
}
