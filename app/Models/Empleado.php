<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreEmpleado',
        'apellidoEmpleado',
        'sobrenombreEmpleado',
        'user_id'

    ];

    // Verificar la relación
    public function datosPersonales(){
        return $this->hasOne(user::class);
    }
}
