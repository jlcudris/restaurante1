<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trabajador;


class TrabajadoresController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'cedula' => 'required|unique:trabajadores,cedula',
            'correo' => 'required|email|unique:trabajadores,correo',
            'telefono' => 'required',

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
        $trabajador = Trabajador::create([
            'nombre' => request('nombre'),
            'apellido_paterno' => request('apellido_paterno'),
            'apellido_materno' => request('apellido_materno'),
            'sexo' => request('sexo'),
            'cedula' => request('cedula'),
            'correo' => request('correo'),
            'telefono' => request('telefono'),
        ]);
        return response()->json( ['message' => 'Trabajador registrado con exito'],201 );
        }
        return response()->json( ['message' => 'Error al registrar'],500 );
    }
}
