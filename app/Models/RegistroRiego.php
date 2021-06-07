<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroRiego extends Model
{
    use HasFactory;

    protected $fillable = [
        'huerta_id',
        'seccion_id',
        'metodoRiego',
        'fecha',
        'horaInicio',
        'horaFin',
        'horas',
        'litrosHora',
        'consumoEnergia',
        'empleado_id',
        'user_id',
    ];

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
