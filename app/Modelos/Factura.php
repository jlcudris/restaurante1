<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "factura";
    protected $primaryKey = 'id_factura';

    protected $fillable = [
        'id_pedido', 'codigo', 'fecha', 'valor_total', 'id_mesa',
    ];

    public $timestamps=false;
}
