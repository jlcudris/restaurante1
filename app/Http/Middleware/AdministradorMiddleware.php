<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class AdministradorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       //Obtener los datos del usuario
       $user=DB::table('users as u')->where('u.id','=',Auth::id())->first();
       //Comprobar los datos del user con la tabla usuarios
       $validacion_user=DB::table('trabajadores as us')->where('us.correo','=',$user->email)
       ->first();


      // exit;


       if($validacion_user!==null){
          $user_administrador=DB::table('user_cargo as uc')
          ->where('uc.id_trabajador','=',$validacion_user->id_trabajador)
          ->where(function($query) {
            $query->where('uc.id_cargo', 1)
                ->orWhere('uc.id_cargo','=',2);
            })->get();

          if(count($user_administrador)>0 ){
              return $next($request);
          }
         else{
             return response()->json('No tienes permiso',401); //dd('No tienes permiso');
          }
       }else{
          return response()->json('No tienes permiso',401); //dd('No tienes permiso');
       }
    }
}
