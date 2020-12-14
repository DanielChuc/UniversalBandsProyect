<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('pais')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('codigoPostal')->nullable();
            $table->string('telefono')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
