<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplicacionFertilizante extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaAplicacion',
        'huerta_id',
        'seccion_id',
        'id_fertilizante',
        'kilosHectarea',
        'metodoAplicacion',
        'empleado_id',
        'user_id',
    ];
}