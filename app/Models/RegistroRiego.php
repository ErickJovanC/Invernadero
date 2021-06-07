<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroRiego extends Model
{
    use HasFactory;

    protected $fillable = [
        'huerta_id',
        'seccion_id',
        'metodoRiego',
        'fecha',
        'horaInicio',
        'horaFin',
        'litrosHora',
        'consumoEnergia',
        'empleado_id',
        'user_id',
    ];
}
