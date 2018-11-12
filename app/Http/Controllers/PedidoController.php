<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidoController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'nombre_cliente' => 'required',
            'id_trabajador' => 'required',
            'id_mesa' => 'required',
            'fecha_pedido' => 'required',
            'estado' => 'required'

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
        $cargo = Pedido::create([
            'nombre_cliente' => request('nombre_cliente'),
            'id_trabajador' => request('id_trabajador'),
            'id_mesa' => request('id_mesa'),
            'fecha_pedido' => request('fecha_pedido'),
            'estado' => request('estado'),
        ]);
        return response()->json( ['message' => 'Pedido creado con exito'],201 );
        }
        return response()->json( ['message' => 'Error al Realizar pedido'],400 );
    }
}
