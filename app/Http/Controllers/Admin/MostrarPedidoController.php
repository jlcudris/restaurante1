<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MostrarPedidoController extends Controller
{
    public function index(Request $request)
    {
        //iterar todos los pedidos que estan pendiente y listarlos por fecha 

        $pedido = DB::table('detallespedidos_platos as dp')
        ->select('pl.nombre', 'pl.imagenplato', 'pe.nombre_cliente', 'me.num_mesa', 'pe.fecha_pedido', 'pe.hora_pedido', 'pe.estado')
        ->join('platos as pl', 'dp.id_plato','pl.id_plato')
        ->join('pedido as pe', 'dp.id_pedido','pe.id_pedido')
        ->join('mesas as me', 'pe.id_mesa','me.id')
        ->where('dp.id_pedido',request('id_pedido'))
        ->get();
        
        return response()->json([$pedido]);
    }
}
