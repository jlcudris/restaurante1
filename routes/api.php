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
Route::group(['middleware' => 'Cors'], function () {
    
Route::post('login', 'Api\Auth\LoginController@login');

Route::get('obtenerOfertas','AppMovil\ObtenerImagenOfertasController@obtenerOfertas');
Route::get('obetenerPlatos/{id}','AppMovil\ObtenerImagenOfertasController@obtenerTipoPlatos');
Route::post('RegistrarPedidos','AppMovil\ObtenerPedidosController@obtenerPedidos');
Route::post('cancelarPedidos','AppMovil\ObtenerPedidosController@cancelarPedido');
Route::post('RegistrarPedidosOfertas','AppMovil\ObtenerPedidosController@obtenerPedidosOfertas');
Route::post('cancelarPedidosOfertas','AppMovil\ObtenerPedidosController@cancelarPedidoOfeerta');


Route::post('plato', 'Admin\PlatosController@create_plato');
Route::middleware(['auth:api', 'admin'])->group(function () {
    Route::post('register', 'Api\Auth\RegisterController@register');
    Route::post('registerWorks', 'Admin\TrabajadoresController@create');
    Route::post('crearCargo', 'Admin\CargoController@create');
    Route::post('mesas', 'Admin\MesasController@create');
    Route::post('tipo_plato', 'Admin\PlatosController@create_tipo_plato');
    Route::post('logout', 'Api\Auth\LoginController@logout');
    Route::post('CargoUsuario', 'Admin\UserCargoController@create');
    Route::post('factura', 'Admin\FacturaController@create');
    Route::post('get_factura', 'Admin\FacturaController@get_factura');

    //mostrar pedidos
    Route::get('mostrarPedidos', 'Admin\MostrarPedidoController@index');
    
    //extras
    Route::get('getCargos', 'Admin\CargoController@obtener_cargo');
    Route::get('getMesas', 'Admin\MesasController@get_mesa');
    Route::get('get_tipo_plato', 'Admin\PlatosController@get_tipo_platos');
    Route::get('get_reporte', 'Admin\ReportesController@dia');
    
});
});

