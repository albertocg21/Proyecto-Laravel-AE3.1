<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    //$fillable sirve para proteger qué campos se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'email',
        'clase',
        'fecha',
    ];
}

