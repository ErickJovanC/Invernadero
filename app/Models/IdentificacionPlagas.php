<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificacionPlagas extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'periodoMonitoreo',
        'plaga_id',
        'unidadMuestreo',
        'cantidadEncontrada',
        'danioPlaga',
        'foto',
        'empleado_id',
        'user_id',
    ];

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function plaga(){
        return $this->belongsTo(Plaga::class);
    }
}
