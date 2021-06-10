<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido_p',
        'apellido_m',
        'telefono',
        'direccion',
        'foto',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
