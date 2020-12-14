<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('pais')->nullable();
            $table->string('ciudad')->nullable();
            $table->dateTime('fechas')->nullable();
            $table->integer('capacidad_Lugares')->nullable();
            $table->integer('lugares_Disponibles')->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eventos');
    }
}
