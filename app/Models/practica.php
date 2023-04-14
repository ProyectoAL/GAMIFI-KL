<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class practica extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'id_profesor',
        'codigo',
        'nombre',
        'descripcion',
        'puntuacion'
    ];
}
