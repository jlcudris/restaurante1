<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = "platos";
    protected $primaryKey = 'id_plato';

    protected $fillable = [
        'nombre', 'id_tipo_plato','precio', 'imagenplato', 'cedula', 'descripcion',
    ];

    public $timestamps=false;
}
