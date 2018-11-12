<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = "oferta_dia";

    protected $primaryKey='id_promociones';

    public $timestamps=false;

    protected $fillable = [
        'nombre_promocion', 'valor_promocion','rutaimagen','descripcion_pro','fecha_creacion','fecha_promo','fin_fecha_promo','estado'
    ];
}
