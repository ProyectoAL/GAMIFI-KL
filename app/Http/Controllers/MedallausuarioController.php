<?php

namespace App\Http\Controllers;

use App\Models\medallausuario;
use Illuminate\Http\Request;

class MedallausuarioController extends Controller
{
    public function Indexall(){//Muestra todas las medallas de un usuario de un solo ranking

    }
    public function createmedallauser(Request $request){//poner medallas a los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'id_medalla'
            ]);
        $createmedallauser= new medallausuario();
        $createmedallauser->id_usuario= $request->id_usuario;
        $createmedallauser->id_ranking= $request->id_ranking;
        $createmedallauser->id_medalla= $request->id_medalla;
        $createmedallauser->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully',
            "value" => $createmedallauser
        ]);
    }
    public function updatemedallausuario(){//actualizar las medallas de los usuarios
    }
    public function deletemedallausuario(){//eliminar las medallas de los usuarios
    }
}
