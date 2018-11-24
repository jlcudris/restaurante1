<?php

namespace App\Modelos\PEDIDOS;

use Illuminate\Database\Eloquent\Model;

class DetallePedidoPlato extends Model
{
    protected $table = "detallespedidos_platos";
    protected $primaryKey = 'id_';


    public $timestamps=false;

    protected $fillable = [
        'id_pedido', 'id_plato', 'cantidad'
    ];
}