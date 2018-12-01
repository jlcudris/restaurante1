<?php
namespace App\Http\Controllers\AppMovil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Modelos\PEDIDOS\Pedidos;
use App\Modelos\PEDIDOS\DetallePedidoPlato;
use App\Modelos\PEDIDOS\PedidosOfertas;
use App\Modelos\PEDIDOS\DetallesPedidosOfertas;


use Carbon\Carbon;


class ObtenerPedidosController extends Controller
{
    //funcion que debuelve las ofertas  en la base de datos miestras esten activas
    public function obtenerPedidos(Request $request){





            $validator=\Validator::make($request->all(),[
                'nombre_cliente' => 'required|max:200',
                'id_mesa' => 'required|numeric',
                // 'hora_pedido' => 'date_format:"H:i:s"|required',
                'array_producto.*.id_plato'=>'required|numeric',
                'array_producto.*.cantidad'=>'required|numeric'
            ]);
            if($validator->fails()){
              //return response()->json(['errors'=>$validator->errors()->all()]);
              // return response()->json( $datos='nO ' );
              return response()->json( $errors=$validator->errors()->all(),200 );
            }else{

                $fecha= date('Y-m-d');
                $time=time();

                $date = Carbon::now("America/Bogota");
                $time=$date->toTimeString();

                try{
                    DB::beginTransaction();

            $pedido =Pedidos::create([
                'nombre_cliente' => request('nombre_cliente'),
                'id_mesa' => request('id_mesa'),
                'fecha_pedido' =>$fecha,
                'hora_pedido' => $time,
                'estado' =>'pendiente'
            ]);

            $array_producto=request('array_producto');

            $array_producto_c=json_encode($array_producto,true);
            //decodificcion del reques recibido para iterar el aary
            $array_producto_d=json_decode($array_producto_c,true);

            for($i=0; $i<sizeof($array_producto_d);$i++)
            {//validar los array de pedidos sisn polatoas o bebidad pendiente estrreucturar mejor
                $detalle_pedido_plato =DetallePedidoPlato::create([
                    'id_pedido' =>$pedido->id_pedido,
                    'id_plato' =>$array_producto_d[$i]["id_plato"],
                    'cantidad' =>$array_producto_d[$i]["cantidad"],

                ]);
            }
            DB::commit();
            return response()->json( ['message' => 'pedido creado con exito',"id_pedido"=>$pedido->id_pedido],201 );
            }
            catch(Exeption $e){
                DB::rollBack();
            }
            }
    }



    public function cancelarPedido(Request $request){

        $validator=\Validator::make($request->all(),[
            'id_pedido' => 'required|numeric'
          
        ]);
        if($validator->fails()){
          //return response()->json(['errors'=>$validator->errors()->all()]);
          // return response()->json( $datos='nO ' );
          return response()->json( $errors=$validator->errors()->all(),400);
        }else{


            $cancelarP=DB::table('pedido')
            ->where('id_pedido', request('id_pedido'))
            ->delete();

            $borrardetalle_pedido=DB::table('detallespedidos_platos')
            ->where('id_pedido',request('id_pedido'))
            ->delete();

            return response()->json( ['message' => 'pedido cancelado'],201 );
    }



}


public function obtenerPedidosOfertas(Request $request){


  


   
    $validator=\Validator::make($request->all(),[
        'nombre_cliente' => 'required|max:200',
        'id_mesa' => 'required|numeric',
        // 'hora_pedido' => 'date_format:"H:i:s"|required',
        'array_oferta.*.id_oferta'=>'required|numeric',
        'array_oferta.*.cantidad'=>'required|numeric'
    ]);
    if($validator->fails()){
      //return response()->json(['errors'=>$validator->errors()->all()]);
      // return response()->json( $datos='nO ' );
      return response()->json( $errors=$validator->errors()->all(),200 );
    }else{

        $fecha= date('Y-m-d');
        $time=time();

        $date = Carbon::now("America/Bogota");
        $time=$date->toDateTimeString();

        try{
            DB::beginTransaction();

    $pedido =PedidosOfertas::create([
        'nombre_cliente' => request('nombre_cliente'),
        'id_mesa' => request('id_mesa'),
        'fecha_venta' =>$time,
        'estado' =>'pendiente'
    ]);

    $array_producto=request('array_oferta');

    $array_producto_c=json_encode($array_producto,true);
    //decodificcion del reques recibido para iterar el aary
    $array_producto_d=json_decode($array_producto_c,true);

    for($i=0; $i<sizeof($array_producto_d);$i++)
    {//validar los array de pedidos sisn polatoas o bebidad pendiente estrreucturar mejor
        $detalle_pedido_oferta =DetallesPedidosOfertas::create([
            'idpedido_oferta' =>$pedido->id_pedido_oferta,
            'id_oferta' =>$array_producto_d[$i]["id_oferta"],
            'cantidad' =>$array_producto_d[$i]["cantidad"],

        ]);
    }
    DB::commit();
    return response()->json( ['message' => 'pedidode ofertas creado con exito'],201 );
    }
    catch(Exeption $e){
        DB::rollBack();
    }
    }
}

public function cancelarPedidoOfeerta(Request $request){

    $validator=\Validator::make($request->all(),[
        'id_pedido_oferta' => 'required|numeric'
      
    ]);
    if($validator->fails()){
     
      return response()->json( $errors=$validator->errors()->all(),400);
    }else{


        $cancelarPOferta=DB::table('pedido_oferta')
        ->where('id_pedido_oferta', request('id_pedido_oferta'))
        ->update(['estado' => 'cancelado']);

        $borrardetalle_oferta=DB::table('detallespedidos_ofertas')
        ->where('idpedido_oferta',request('id_pedido_oferta'))
        ->delete();

        return response()->json( ['message' => 'pedido oferta cancelado'],201 );
}



}

public function pedidoCamino(Request $request){

    $validator=\Validator::make($request->all(),[
        'id_pedido' => 'required|numeric'
      
    ]);
    if($validator->fails()){
      //return response()->json(['errors'=>$validator->errors()->all()]);
      // return response()->json( $datos='nO ' );
      return response()->json( $errors=$validator->errors()->all(),400);
    }else{

        $sw=0;
        $terminado=DB::table('pedido')
    
        ->select('estado') 
        ->where('id_pedido', request('id_pedido'))
        ->first();

        if($terminado->estado =='terminado'){

            $sw=$sw+1;


        }

        //aqui debes mirar
        return response()->json(['code' => $sw],201);
    }

}

}
