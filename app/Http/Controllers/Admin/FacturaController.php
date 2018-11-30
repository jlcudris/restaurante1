<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Modelos\Factura;

class FacturaController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'id_pedido' => 'required',
            'id_mesa' => 'required',
            'codigo' => 'required',

        ]);
        if($validator->fails()){
          return response()->json( $errors=$validator->errors()->all(),200);
        }else{

        $valor = DB::table('detallespedidos_platos as dp')
        ->join('platos as pt', 'dp.id_plato', 'pt.id_plato')
        ->where('dp.id_pedido', request('id_pedido'))
        ->get();
        
        $valor_total = 0;
        foreach ($valor as $val) {
            $plato_valor = DB::table('platos as pl')
            ->where('pl.id_plato',$val->id_plato)
            ->get();

            $valor_total += $val->cantidad * $val->precio;
        }
        $cargo = Factura::create([
            'id_pedido' => request('id_pedido'),
            'codigo' => request('codigo'),
            'fecha' => date('Y-m-d'),
            'valor_total' => $valor_total,
            'id_mesa' => request('id_mesa'),
        ]);
        return response()->json( ['message' => 'Factura generada'],201);
        }
        return response()->json( ['message' => 'Error al generar factura'],400);
    }

    public function get_factura(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'id_mesa' => 'required',

        ]);
        if($validator->fails()){
          return response()->json( $errors=$validator->errors()->all(),200);
        }else{

        $pedido = DB::table('pedido as pe')
        ->where('id_mesa', request('id_mesa'))
        ->get();

        $factura_arr = array();
        foreach ($pedido as $pe) {
            $factura = DB::table('factura as fa')
            ->where('id_pedido', $pe->id_pedido)
            ->where('id_mesa', request('id_mesa'))
            ->first();
        }
    }

    $factura_arr = array_add($factura_arr, 'factura', $factura);
    return response()->json($factura_arr,201);
    }
}
