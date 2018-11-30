<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public function diario()
    {
        $pedidos = DB::table('pedido as pe')
        ->where('pe.fecha_pedido', date('Y-m-d'))
        // ->where('pe.estado', 'terminado')
        ->get();

        $platos_arr = array();
        $mas_vendidos_arr = array();
        foreach($pedidos as $detalle){
            $id_platos = DB::table('detallespedidos_platos as dp')
            ->where('dp.id_pedido', $detalle->id_pedido)
            // ->where('pe.estado', 'terminado')
            ->orderby('dp.id_plato', 'asc')
            ->get();

            
            foreach($id_platos as $plato){
                $platos = DB::table('platos as pl')
                ->where('pl.id_plato', $plato->id_plato)
                ->get();

                $platos_arr = array_add($platos_arr, $plato->id_plato, $platos);
                array_add($platos_arr[$plato->id_plato], 'datos', ['cantidad' => $plato->cantidad,'cliente' => $detalle->nombre_cliente]);
            }
            
        }


        return response()->json(['platos_vendidos' => $platos_arr]);
    }


    public function dia(){


        /*$pedidoss = DB::table('pedido as pe')
        ->select( DB::raw('dp.cantidad*pl.precio as total_venta'),'pe.nombre_cliente','pe.id_mesa','pe.fecha_pedido','pe.hora_pedido','pe.estado','pl.nombre','pl.precio','dp.cantidad')
        ->join('detallespedidos_platos as dp','pe.id_pedido','=',"dp.id_pedido")
        ->join('platos as pl','dp.id_plato','=','pl.id_plato')
        ->where('pe.fecha_pedido', date('Y-m-d'))
        ->get();*/

        $pedidos=DB::table('pedido as pe')
                    ->select(DB::raw('sum(pl.precio*dp.cantidad) as price'),DB::raw('sum(dp.cantidad) as cantidad'),'pl.nombre','pl.id_plato','pl.precio as precio_cantidad')
                    ->join('detallespedidos_platos as dp','dp.id_pedido','=','pe.id_pedido')
                    ->join('platos as pl','pl.id_plato','=','dp.id_plato')
                    ->groupby('pl.id_plato','pl.nombre','pl.precio')
                    ->get();


       

        $platomasVendido=DB::table('platos as p')
                             ->select(DB::raw('sum(dp.cantidad) as cantidad_max'),'p.nombre')
                             ->join('detallespedidos_platos as dp','dp.id_plato','=','p.id_plato')
                             ->join('pedido as pe','pe.id_pedido','=','dp.id_pedido')
                             ->where('pe.fecha_pedido',date('Y-m-d'))
                             ->groupby('p.id_plato', 'p.nombre')
                             ->orderby('cantidad_max','desc')
                             ->first();


        
        return response()->json(['platos_vendidos' => $pedidos,'plato ams vendido'=>$platomasVendido]);
    }

}
