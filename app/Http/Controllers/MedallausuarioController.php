<?php

namespace App\Http\Controllers;

use App\Models\medallausuario;
use Illuminate\Http\Request;

class MedallausuarioController extends Controller
{
    public function indexallmedaalauser(){//Muestra todas las medallas de un usuario de un solo ranking

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
    public function updatemedallausuario(Request $request, $id){//actualizar las medallas de los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'Responsabilidad',
            'Cooperación',
            'Autonomía e iniciativa',
            'Gestión emocional',
            'Habilidades de pensamiento'
            ]);
            $user_id = $id;
            $sql="Sele ";

    }
    public  function updatetrigger(Request $request){
        $trigger="
        create trigger updatetrigger
        AFTER INSERT ON nombre_de_la_tabla
        FOR EACH ROW
        BEGIN
            -- Código SQL del trigger
        END;
        ";
    }
    public function deletemedallausuario(Request $request){//eliminar las medallas de los usuarios
        medallausuario::destroy($request->id);
    }
}
