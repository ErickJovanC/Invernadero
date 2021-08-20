<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlPreventivoPlaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'plagas',
        'acciones',
        'costo',
        'empleado_id',
        'user_id',
    ];

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }
    
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
