<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplicacionFertilizanteOrganico extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'cantidadAplicada',
        'superficie',
        'tipoFertilizante',
        'empleado_id',
        'user_id',
    ];
}
