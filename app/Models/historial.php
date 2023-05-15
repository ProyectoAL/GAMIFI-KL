<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class historial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_ranking',
        'alumno_evaluador',
        'alumno_evaluado',
        'puntos_dados',
        'soft_skill'
    ];

    protected $dates = ['deleted_at'];
}
