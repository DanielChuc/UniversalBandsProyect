<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/pedidos/{id}', 'PruebaController@pedido')->name('pedidos');

/**
 * pedido personalizado
 */
Route::get('/pedidost/nuevo', 'PedidoController@nuevo');
Route::post('/pedidost/guardar', 'PedidoController@guardar');




Route::resource('pizza', 'PizzaController');
Route::resource('cliente', 'ClienteController');
Route::resource('pedido', 'PedidoController');
Route::resource('linea-pedido', 'LineaPedidoController');