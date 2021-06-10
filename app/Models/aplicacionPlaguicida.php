<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aplicacionPlaguicida extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'horas',
        'minutos',
        'tipoPlaguicida',
        'nombreComercial',
        'ingredienteActivo',
        'colorBanda',
        'dosisAplicada',
        'empleado_id',
        'user_id',
    ];
}
