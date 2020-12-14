<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventoPermitidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento_permitidos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('evento_id')->unsigned();
            $table->integer('banda_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('banda_id')->references('id')->on('bandas')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('evento_permitidos');
    }
}
