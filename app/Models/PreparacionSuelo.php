<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparacionSuelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'huerta_id',
        'seccion_id',
        'labor',
        'fechaInicio',
        'fechaFin',
        'horasMaquinaria',
        'costoHora',
        'costoOperacion',
        'metodoUtilizado',
        'empleado_id',
        'user_id',
    ];
}
