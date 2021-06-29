<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaguicida extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredienteActivo',
        'nombreComercial',
        'tipo',
        'colorBanda',
        'user_id',
    ];
}
