<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class UserCargo extends Model
{
    protected $table = "user_cargo";
    protected $primaryKey = 'id_user_cargo';

    protected $fillable = [
        'id_trabajador', 'id_cargo', 'observaciones'
    ];
}
