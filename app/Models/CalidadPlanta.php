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
        'Plantadas',
        'porPlantar',
        'variedadPlanta',
        'lote',
        'resistenciaPlagas',
        'toleranciaPlagas',
        'certificado',
        'costo',
        'empleado_id',
        'user_id'
    ];

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
