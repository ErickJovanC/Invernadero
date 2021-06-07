<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimpiezaCanales extends Model
{
    use HasFactory;

    protected $fillable = [
    'huerta_id',
    'fecha',
    'nombreCanal',
    'longitud',
    'revestimiento',
    'accionesRealizadas',
    'observaciones',
    'empleado_id',
    'user_id',
    ];

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }

    public function Empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
