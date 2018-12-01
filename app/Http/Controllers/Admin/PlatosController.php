<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelos\Plato;
use App\Modelos\Tipo_Plato;
use Illuminate\Support\Facades\DB;

class PlatosController extends Controller
{
    public function create_plato(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'id_tipo_plato' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'imagenplato' => 'required',
            'descripcion' => 'required'

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
            $can = 0;
            $tipo = DB::table('tipo_platos')->get();
            foreach($tipo as $tip){
                if($tip->id == request('id_tipo_plato')){
                    $can = 1;
                }
            }
            if($can){
                if($request->file('imagenplato')){
                    $file = $request->file('imagenplato');
                    $name = $file->getClientOriginalName();
                    $file->move(public_path().'/img/platos/',time().$name);
                    $plato = Plato::create([
                        'id_tipo_plato' => request('id_tipo_plato'),
                        'nombre' => request('nombre'),
                        'precio' => request('precio'),
                        'imagenplato' => time().$name,
                        'descripcion' => request('descripcion'),
                    ]);
                    return response()->json( ['message' => 'Plato creado con exito'],201 );
                }else{
                    return response()->json( ['message' => 'Imagen no valida'],401 );
                }
            }else{
                return response()->json( ['message' => 'Tipo plato no encontrado'],401 );
            }
        }
        return response()->json( ['message' => 'Error al crear plato'],400 );
    }

    public function create_tipo_plato(Request $request)
    {
        $validator=\Validator::make($request->all(),[
            'nombre' => 'required',
            'descripcion' => 'required'

        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
            
                $tipo = Tipo_Plato::create([
                    'nombre' => request('nombre'),
                    'descripcion' => request('descripcion'),
                ]);
                return response()->json( ['message' => 'Tipo de plato creado con exito'],201 );{
            
        }
            return response()->json( ['message' => 'Error al crear tipo de plato'],400 );
        }

    }
    public function get_tipo_platos()
    {
        $tipo_platos = DB::table('tipo_platos as tp')
        ->select('tp.id', 'tp.nombre', 'tp.descripcion')
        ->get();

        return response()->json(['tipo_plato' => $tipo_platos]);
    }

    public function get_platos()
    {
        $platos = DB::table('tipo_platos as tp')
        ->select('tp.id', 'tp.nombre', 'tp.descripcion')
        ->get();

        return response()->json(['tipo_plato' => $tipo_platos]);
    }
}
