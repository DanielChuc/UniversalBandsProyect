<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLineaPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pizza_id')->unsigned();
            $table->integer('pedido_id')->unsigned();
            $table->integer('cantidad')->nullable();
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('linea_pedidos');
    }
}
