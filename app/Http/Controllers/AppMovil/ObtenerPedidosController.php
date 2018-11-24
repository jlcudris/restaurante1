<?php
namespace App\Http\Controllers\AppMovil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Modelos\PEDIDOS\Pedidos;
use App\Modelos\PEDIDOS\DetallePedidoPlato;
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
            return response()->json( ['message' => 'pedido creado con exito'],201 );


            }
            catch(Exeption $e){

                DB::rollBack();

            }
            }

    }

}
