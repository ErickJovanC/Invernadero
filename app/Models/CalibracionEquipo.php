<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalibracionEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'equipo',
        'producto',
        'repeticiones',
        'recipiente',
        'pesoInicial',
        'pesoFinal',
        'gastoEquipo',
        'longitud',
        'ancho',
        'area',
        'gastoManzana',
        'empleado_id',
        'user_id',
    ];
}
