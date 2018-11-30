<?php 
namespace App\Http\Controllers\AppMovil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ObtenerImagenOfertasController extends Controller
{
    //funcion que debuelve las ofertas  en la base de datos miestras esten activas 
    public function obtenerOfertas(Request $request){

            
        $oferta_dia=DB::table('oferta_dia as of')
        ->where('of.estado','=',1)
        ->select('id_promociones','nombre_promocion','valor_promocion','rutaimagen','descripcion_pro')->get();
       
       
       // validar que la ruta exista  pendinete 
    foreach($oferta_dia as $item){

        $img = public_path()."/img/ofertas/".$item->rutaimagen;
        $type = pathinfo($img, PATHINFO_EXTENSION);
        $code = file_get_contents($img);
         $item->b64 = 'data:image/'.$type.';base64,'.base64_encode($code);
    }
        
        return response()->json(["ofertas"=>$oferta_dia]);
    
       
       
    }


    public function obtenerTipoPlatos(Request $request,$id){

$tiposplato =DB::table('platos as p')
->join('tipo_platos as tp','p.id_tipo_plato','=','tp.id')
->where('tp.id','=', $id)
->select('p.id_plato','p.nombre','p.precio','p.imagenplato','p.descripcion')->get();


foreach($tiposplato as $platos){
    $img = public_path()."/img/platos/".$platos->imagenplato;
    $type = pathinfo($img, PATHINFO_EXTENSION);
    $code = file_get_contents($img);
     $platos->b64 = 'data:image/'.$type.';base64,'.base64_encode($code);
}
    //return response()->json($oferta_dia->rutaimagen);
    return response()->json(["platos"=>$tiposplato]);

      


    
}

}