<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalibracionEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'equipo',
        'producto',
        'pesoInicial',
        'pesoFinal',
        'gastoEquipo',
        'longitud',
        'ancho',
        'area',
        'gastoManzana',
        'comentario',
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
