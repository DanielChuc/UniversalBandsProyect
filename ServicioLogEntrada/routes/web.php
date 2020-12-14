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
Route::get('/prueba', function () {
    return view('contenido');
});
Route::get('/home', function () {
    return view('hola');
});

// Route::get('/introducir', function () {
//     return view('pase');
// });


//Route::get('/bandas', 'PruebaController@banda');

/**
 * Validar las entradas
 */


//Route::get('/introducirt/analizar/{banda?}', 'BandaController@analizar');


//Route::get('/introducir/{data}', 'PruebaController@entrada')->name('introducir');


Route::get('/introducirt/validar/{id}', 'BandaController@validar');
Route::post('/introducirt/validar/{id}', 'BandaController@analizar');

Route::get('/seleccionar', 'PruebaController@Evento');
////////////////////////////////////////////////////////////////////////////////////////////




Route::get('/bandas/{id}/{id2}', 'PruebaController@banda')->name('bandas');


Route::get('/bandast/nuevo', 'BandaController@nuevo');
Route::post('/bandast/guardar', 'BandaController@guardar');


Route::get('/holas', 'PruebaController@generarCodigo');




Route::resource('categoria', 'CategoriaController');
Route::resource('evento', 'EventoController');
Route::resource('cliente', 'ClienteController');
Route::resource('log-entrada', 'LogEntradaController');
Route::resource('banda', 'BandaController');
Route::resource('evento-permitido', 'EventoPermitidoController');


