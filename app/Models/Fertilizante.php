<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertilizante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreFertilizante',
        'N',
        'P2O5',
        'K2O',
        'Ca',
        'Mg',
        'S',
        'microelementos',
        'macroelementos',
        'comentario',
        'user_id',
    ];
}
