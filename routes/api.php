<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\Auth\RegisterController@register');
Route::post('login', 'Api\Auth\LoginController@login');

Route::get('obetenerOfertas','AppMovil\ObtenerImagenOfertasController@obtenerOfertas');
Route::get('obetenerPlatos/{id}','AppMovil\ObtenerImagenOfertasController@obtenerTipoPlatos');
Route::post('RegistrarPedidos','AppMovil\ObtenerPedidosController@obtenerPedidos');



Route::middleware('auth:api')->group(function () {
    Route::post('registerWorks', 'TrabajadoresController@create');
    Route::post('crearCargo', 'CargoController@create');
    Route::post('CargoUsuario', 'UserCargoController@create');
    Route::post('pedido', 'PedidoController@create');
    Route::post('mesas', 'MesasController@create');
});
