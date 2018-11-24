<?php

namespace App\Modelos\PEDIDOS;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = "pedido";
    protected $primaryKey = 'id_pedido';


    public $timestamps=false;

    protected $fillable = [
        'nombre_cliente', 'id_mesa', 'fecha_pedido','hora_pedido','estado'
    ];
}