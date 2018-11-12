<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedido";
    protected $primaryKey = 'id_pedido';

    protected $fillable = [
        'nombre_cliente', 'id_trabajador', 'id_mesa', 'fecha_pedido', 'estado'
    ];
}
