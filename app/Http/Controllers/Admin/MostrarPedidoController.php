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
        ->join('mesas as me', 'pe.id_mesa','me.id')
        ->where('pe.fecha_pedido',date('Y-m-d'))
        ->orderBy('pe.hora_pedido', 'asc')
        ->get();


        $pedidos_arr = array();
        foreach($pedidos as $pedido){
            $lista_pedido = DB::table('detallespedidos_platos as dp')
            ->select('dp.id_pedido', 'pl.id_plato', 'pl.nombre', 'pl.imagenplato', 'pe.nombre_cliente', 'pe.fecha_pedido', 'pe.hora_pedido', 'pe.estado', 'dp.cantidad')
            ->join('platos as pl', 'dp.id_plato','pl.id_plato')
            ->join('pedido as pe', 'dp.id_pedido','pe.id_pedido')
            ->where('dp.id_pedido',$pedido->id_pedido)
            ->get();

            $pedidos_arr = array_add($pedidos_arr, 'mesa '.$pedido->num_mesa.' '.$pedido->id_pedido, $lista_pedido);
        }
        
        return response()->json($pedidos_arr);
    }
}
