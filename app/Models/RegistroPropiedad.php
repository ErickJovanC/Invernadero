<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPropiedad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreHuerta',
        'codigoRegistro',
        'estado_id',
        'municipio_id',
        'colonia',
        'calle',
        'user_id'
    ];

    public function estados(){
        return $this->belongsTo(Estados::class);
    }
    
    public function municipios(){
        return $this->belongsTo(Municipios::class);
    }
}