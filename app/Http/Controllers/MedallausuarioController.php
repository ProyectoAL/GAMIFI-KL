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
        $createmedallauser->id_ranking= $request->id_ranking;
        $createmedallauser->codigo= $request->codigo;
        $createmedallauser->Responsabilidad=$request->Responsabilidad;
        if(!empty($createmedallauser->Responsabilidad)){
            $createmedallauser->Responsabilidad=26;
        }
        $createmedallauser->Cooperación=$request->Cooperación;
        if(!empty($createmedallauser->Cooperación)){
            $createmedallauser->Cooperación=26;
        }
        $createmedallauser->Autonomía_e_iniciativa=$request->Autonomía_e_iniciativa;
        if(!empty($createmedallauser->Autonomía_e_iniciativa)){
            $createmedallauser->Autonomía_e_iniciativa=26;
        }
        $createmedallauser->Gestión_emocional=$request->Gestión_emocional;
        if(!empty($createmedallauser->Gestión_emocional)){
            $createmedallauser->Gestión_emocional=26;
        }
        $createmedallauser->abilidades_de_pensamiento=$request->abilidades_de_pensamiento;
        if(!empty($createmedallauser->abilidades_de_pensamiento)){
            $createmedallauser->abilidades_de_pensamiento=26;
        }
        $createmedallauser->puntos_semanales=$request->puntos_semanales;
        $createmedallauser->id_usuario= $request->id_usuario;
        $createmedallauser->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully',
            "value" => $createmedallauser
        ]);
    }
    public function updatemedallaResponsabilidad(Request $request, $id){//actualizar las medallas de los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'Responsabilidad'
            ]);
    }
    public function updatemedallaCooperación(Request $request, $id){//actualizar las medallas de los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'Cooperación'
            ]);
    }
    public function updatemedallaAutonomía_e_iniciativa(Request $request, $id){//actualizar las medallas de los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'Autonomía_e_iniciativa'
            ]);
    }
    public function updatemedallaGestión_emocional(Request $request, $id){//actualizar las medallas de los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'Gestión_emocional'
            ]);
    }
    public function updatemedallaHabilidades_de_pensamiento(Request $request, $id){//actualizar las medallas de los usuarios
        $request->validate([
            'id_usuario',
            'id_ranking',
            'Habilidades_de_pensamiento'
            ]);
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
