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
        'costo',
        'empleado_id',
        'user_id',
    ];

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    public function lote(){
        return $this->belongsTo(CalidadPlanta::class);
    }
}
