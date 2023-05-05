<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soft_Skills extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'nivel',
        'puntosr',
        'rango',
        'medalla'
    ];
}
