<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosecha extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'fecha',
        'huerta_id',
        'seccion_id',
        'kilos',
        'merma',
        'horaInicio',
        'horaFin',
        'tempFruta',
        'tempSuelo',
        'taras',
        'capacidadTara',
        'costo',
        'precioVenta',
        'empleado_id',
        'user_id',
    ];

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
