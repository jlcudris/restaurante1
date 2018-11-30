<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Mesa;
use Illuminate\Support\Facades\DB;


class MesasController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'num_mesa' => 'required',
            'tipo_mesa' => 'required'

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
        $cargo = Mesa::create([
            'num_mesa' => request('num_mesa'),
            'tipo_mesa' => request('tipo_mesa'),
        ]);
        return response()->json( ['message' => 'Mesa creada con exito'],201 );
        }
        return response()->json( ['message' => 'Error al crear mesa'],400 );
    }

    public function get_mesa()
    {
        $mesas = DB::table('mesas as m')
        ->select('m.id', 'm.num_mesa', 'm.tipo_mesa')
        ->get();

        return response()->json(['Mesas' => $mesas]);
    }
}