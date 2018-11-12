<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCargo;

class UserCargoController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'id_trabajador' => 'required',
            'id_cargo' => 'required',
            'observaciones' => 'required'

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
        $cargoUser = UserCargo::create([
            'id_trabajador' => request('id_trabajador'),
            'id_cargo' => request('id_cargo'),
            'observaciones' => request('observaciones'),
        ]);
        return response()->json( ['message' => 'Cargo asignado con exito'],201 );
        }
        return response()->json( ['message' => 'Error al asignar cargo'],500 );
    }
}
