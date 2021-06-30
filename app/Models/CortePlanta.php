<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CortePlanta extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'huerta_id',
        'seccion_id',
        'cantidad',
        'motivo',
        'user_id',
    ];
}
