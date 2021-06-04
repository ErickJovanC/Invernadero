<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroSiembra extends Model
{
    use HasFactory;

    protected $fillable  = [
        'huerta_id',
        'seccion_id',
        'lote_id',
        'cantidadPlantas',
        'fecha',
        'distanciaPlanta',
        'distanciaVesana',
        'riego',
        'empleado_id',
        'user_id',
    ];
}
