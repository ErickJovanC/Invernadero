<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacionPlagas extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'periodoMonitoreo',
        'plaga',
        'unidadMuestreo',
        'cantidadEncontrada',
        'danioPlaga',
        'empleado_id',
        'user_id',
    ];
}
