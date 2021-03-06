<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacitacionPersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        'huerta_id',
        'fecha',
        'nombreCurso',
        'capacitador',
        'empresa',
        'tiempo',
        'costo',
        'empleados',
        'user_id',
    ];

    public function huerta(){
        return $this->belongsTo(RegistroPropiedad::class);
    }
}
