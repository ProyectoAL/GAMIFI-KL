<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniteRanking extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = true;
    protected $fillable = [
        'id_ranking',
        'codigo',
        'puntos',
        'id_usuario'
    ];

    protected $dates = ['deleted_at'];
}
