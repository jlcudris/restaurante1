<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MostrarPedidoController extends Controller
{
    public function index()
    {
        //iterar todos los pedidos que estan pendiente y listarlos por fecha 
        $pedidos = DB::table('pedido as pe')
        ->where('pe.estado','pendiente')
        ->where('pe.fecha_pedido',date('Y-m-d'))
        ->get();


        $pedidos_arr = array();
        foreach($pedidos as $pedido){
            $lista_pedido = DB::table('detallespedidos_platos as dp')
            ->select('pl.nombre', 'pl.imagenplato', 'pe.nombre_cliente', 'me.num_mesa', 'pe.fecha_pedido', 'pe.hora_pedido', 'pe.estado')
            ->join('platos as pl', 'dp.id_plato','pl.id_plato')
            ->join('pedido as pe', 'dp.id_pedido','pe.id_pedido')
            ->join('mesas as me', 'pe.id_mesa','me.id')
            ->where('dp.id_pedido',$pedido->id_pedido)
            ->get();

            $pedidos_arr = array_add($pedidos_arr, $pedido->id_pedido, $lista_pedido);
        }
        
        return response()->json($pedidos_arr);
    }
}
