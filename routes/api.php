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


Route::middleware('auth:api')->group(function () {
    Route::post('registerWorks', 'Admin\TrabajadoresController@create');
    Route::post('crearCargo', 'Admin\CargoController@create');
    Route::post('CargoUsuario', 'Admin\UserCargoController@create');
    Route::post('makePedido', 'Admin\PedidoController@create');
    Route::post('makeMesas', 'Admin\MesasController@create');
});