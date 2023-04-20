<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrega extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'id_usuario',
        'entrega',
        'nota',
        'id_practicas'
    ];
}
