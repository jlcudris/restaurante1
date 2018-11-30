<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Cargo;
use Illuminate\Support\Facades\DB;

class CargoController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'nombre' => 'required',
            'sueldo' => 'required',
            'descripcion' => 'required'

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
        $cargo = Cargo::create([
            'nombre' => request('nombre'),
            'sueldo' => request('sueldo'),
            'descripcion' => request('descripcion'),
        ]);
        return response()->json( ['message' => 'Cargo creado con exito'],201 );
        }
        return response()->json( ['message' => 'Error al registrar'],500 );
    }

    public function obtener_cargo()
    {
        $cargos = DB::table('cargo as c')
        ->select('c.id_cargo', 'c.nombre')
        ->get();

        return response()->json(['cargo' => $cargos]);
    }
}
