<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Modelos\UserCargo;
use App\Modelos\Trabajador;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{

        private $client;

        public function __construct()
        {
            $this->client = Client::find(1);
        }
    
        public function register(Request $request)
        {
    
            $validator=\Validator::make($request->all(),[
                'name' => 'required',
                'apellido_paterno' => 'required',
                'cedula' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'telefono' => 'required',
                'cargo' => 'required',
            ]);
    
            if($validator->fails())
            {
              return response()->json( $errors=$validator->errors()->all() );
            }
    
            else
            {
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

                    
                }
                
        
                $params = [
                    'grant_type' => 'password',
                    'client_id' => $this->client->id,
                    'client_secret' => $this->client->secret,
                    'username' => request('email'),
                    'password' => request('password'),
                    'scope' => '*'
                ];
        
                $request->request->add($params);
        
                $proxy = Request::create('oauth/token', 'POST');
        
                return Route::dispatch($proxy);
        
             
            }
    
    
        }
}
