<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPreventivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'lote_id',
        'plagasPrevenir',
        'fechaAccion',
        'cantidadPlantas',
        'accionPreventiva',
        'costo',
        'responsable_id',
    ];

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function lote(){
        return $this->belongsTo(CalidadPlanta::class);
    }
}
