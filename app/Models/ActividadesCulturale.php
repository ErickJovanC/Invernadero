<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActividadesCulturale extends Model
{
    use HasFactory;

    protected $fillable = [
        'huerta_id',
        'seccion_id',
        'fecha',
        'actividad',
        'costo',
        'comentario',
        'empleado_id',
        'user_id',
    ];
}
