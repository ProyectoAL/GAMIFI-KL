<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniteRanking extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'id_ranking',
        'codigo',
        'Responsabilidad',
        'Cooperacion',
        'Autonomia_e_iniciativa',
        'Gestion_emocional',
        'abilidades_de_pensamiento',
        'puntos_semanales',
        'id_usuario',
        'mote_usuario'
    ];

    protected $dates = ['deleted_at'];
}
