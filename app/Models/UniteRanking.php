<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniteRanking extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'id_ranking',
        'codigo',
        'Responsabilidad',
        'Cooperación',
        'Autonomía_e_iniciativa',
        'Gestión_emocional',
        'abilidades_de_pensamiento',
        'puntos_semanales',
        'id_usuario'
    ];
}
