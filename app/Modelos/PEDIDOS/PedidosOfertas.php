<?php

namespace App\Modelos\PEDIDOS;

use Illuminate\Database\Eloquent\Model;

class PedidosOfertas extends Model
{
    protected $table = "pedido_oferta";
    protected $primaryKey = 'id_pedido_oferta';


    public $timestamps=false;

    protected $fillable = [
        'nombre_cliente', 'id_mesa','fecha_venta','estado'
    ];
}