<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calidadPlanta extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaCorte',
        'fechaRecepcion',
        'origenPlanta',
        'cantidadPlantas',
        'variedadPlanta',
        'lote',
        'resistenciaPlagas',
        'toleranciaPlagas',
        'certificado',
        'user_id'
    ];
}
