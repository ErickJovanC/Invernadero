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
        'empleados',
        'user_id',
    ];
}
