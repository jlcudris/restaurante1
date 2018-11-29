<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tipo_Plato extends Model
{
    protected $table = "tipo_platos";

    protected $fillable = [
        'nombre', 'descripcion',
    ];

    public $timestamps=false;
}
