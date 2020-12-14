<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cliente_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            $table->time('horaEntrada')->nullable();
            $table->date('fechaEntrada')->nullable();
            $table->string('codigoDeEntrada')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_entradas');
    }
}
