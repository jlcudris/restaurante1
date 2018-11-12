<?php 
namespace App\Http\Controllers\AppMovil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ObtenerImagenOfertasController extends Controller
{
    public function obtenerOfertas(Request $request){

            
        $oferta_dia=DB::table('oferta_dia as of')
        ->where('of.estado','=',1)
        ->select('id_promociones','nombre_promocion','valor_promocion','rutaimagen','descripcion_pro')->first();
       
    $file_path=public_path('img/'.$oferta_dia->rutaimagen);
        //return response()->json($oferta_dia->rutaimagen);
        return response()->json(["ofertas"=>$oferta_dia,"ruta_imagen"=>$file_path]);
      //$pathTofile=storage_path()."/img/".$oferta_dia->rutaimagen;

       
       
    }

    public function prubita(){


    }
}
