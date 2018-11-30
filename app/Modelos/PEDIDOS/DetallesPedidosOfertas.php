<?php

namespace App\Modelos\PEDIDOS;

use Illuminate\Database\Eloquent\Model;

class DetallesPedidosOfertas extends Model
{
    protected $table = "detallespedidos_ofertas";
    protected $primaryKey = 'id_p_ofertas';


    public $timestamps=false;

    protected $fillable = [
        'idpedido_oferta', 'id_oferta', 'cantidad'
    ];
}