<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Modelos\Trabajador;
use App\Modelos\UserCargo;
use App\Modelos\Cargo;
use App\User;


class TrabajadoresController extends Controller
{
    public function create(Request $request){

        $validator=\Validator::make($request->all(),[
            'name' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'sexo' => 'required',
            'cedula' => 'required|unique:trabajadores,cedula',
            'email' => 'required|email|unique:trabajadores,correo',
            'telefono' => 'required',

        ]);
        if($validator->fails()){
          return response()->json( $errors=$validator->errors()->all(),200 );
        }else{
            $can = 0;
            $cargo = DB::table('cargo')->get();
            foreach($cargo as $car){
                if($car->id_cargo == request('cargo')){
                    $can = 1;
                }
            }
            if($can){
                $user = User::create([
                    'name' => request('name'),
                    'email' => request('email'),
                    'password' => bcrypt(request('password'))
                ]);

                $trabajador = Trabajador::create([
                    'nombre' => request('name'),
                    'apellido_paterno' => request('apellido_paterno'),
                    'apellido_materno' => request('apellido_materno'),
                    'cedula' => request('cedula'),
                    'sexo' => request('sexo'),
                    'correo' => request('email'),
                    'telefono' => request('telefono')
                ]);

                $asignar_cargo = UserCargo::create([
                    'id_trabajador' => $trabajador->id_trabajador,
                    'id_cargo' => request('cargo')
                ]);

                
                return response()->json( ['message' => 'Trabajador registrado con exito'],201 );
            }else{
                return response()->json( ['message' => 'Error al registrar, Cargo no encontrado'],401 );
            }
        }
    }
}
