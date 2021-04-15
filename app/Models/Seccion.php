<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreSeccion',
        'cantidadPlantas',
        'propiedad_id',
        'user_id',
    ];
    
    public function propiedad(){
        return $this->belongsTo(RegistroPropiedad::class);
    }
}