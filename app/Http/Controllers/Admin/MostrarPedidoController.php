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
        ->join('mesas as me', 'pe.id_mesa','me.id')
        ->where('pe.fecha_pedido',date('Y-m-d'))
        ->where('pe.estado','pendiente')
        ->orderBy('pe.hora_pedido', 'desc')
        ->get();


        $pedidos_arr = array();
        foreach($pedidos as $pedido){
            $lista_pedido = DB::table('detallespedidos_platos as dp')
            ->select('dp.id_pedido', 'pl.id_plato', 'pl.nombre', 'pl.imageb64', 'pe.nombre_cliente', 'pe.fecha_pedido', 'pe.hora_pedido', 'pe.estado', 'dp.cantidad','ms.num_mesa')
            ->join('platos as pl', 'dp.id_plato','pl.id_plato')
            ->join('pedido as pe', 'dp.id_pedido','pe.id_pedido')
            ->join('mesas as ms','pe.id_mesa','ms.id')
            ->where('dp.id_pedido',$pedido->id_pedido)
            ->get();

            $pedidos_arr = array_add($pedidos_arr, 'mesa'.$pedido->num_mesa, $lista_pedido);
        }
        
        if(count($pedidos_arr) > 0){
            return response()->json(['code' => 1,$pedidos_arr],201);
        }else{
            return response()->json(['code' => '0'],401);
        }
    }

    ///pedido terminado
    public function aceptarPedido(Request $request){

        $validator=\Validator::make($request->all(),[
            'id_pedido' => 'required|numeric'
          
        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),400);
        }else{

            $terminado=DB::table('pedido')
            ->where('id_pedido', request('id_pedido'))
            ->update(['estado' => 'terminado']);

            return response()->json(['sucess' => "pedido en camino"],201);
        }

       

    }


    
}
