<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AplicacionFertilizante extends Model
{
    use HasFactory;

    protected $fillable = [
        'fechaAplicacion',
        'huerta_id',
        'seccion_id',
        'fertilizante_id',
        'unidades',
        'precio',
        'metodoAplicacion',
        'empleado_id',
        'user_id',
    ];

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }

    public function fertilizante(){
        return $this->belongsTo(Fertilizante::class);
    }

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }
}