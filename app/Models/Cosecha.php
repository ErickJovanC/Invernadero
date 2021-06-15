<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'kilos',
        'merma',
        'horaInicio',
        'horaFin',
        'taras',
        'materialCajas',
        'cliente_id',
        'empleado_id',
        'user_id',
    ];
}
