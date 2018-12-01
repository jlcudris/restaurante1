<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $table = "platos";
    protected $primaryKey = 'id_plato';

    protected $fillable = [
        'nombre', 'id_tipo_plato','precio', 'cedula', 'descripcion','imageb64'
    ];

    public $timestamps=false;
}
