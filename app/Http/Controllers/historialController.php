<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\historial;
use Illuminate\Support\Facades\DB;

class historialController extends Controller
{

    public function indexhistorial($id_ranking)
    {
        $sql = "SELECT id, alumno_evaluador, alumno_evaluado, puntos_dados, soft_skill, created_at
         FROM historials 
         WHERE id_ranking = $id_ranking;";

        $historial = DB::select($sql);

        return $historial;
    }

    public function indexalumno_evaluador($alumno_evaluador)
    {
        $sql = "SELECT mote
         FROM users 
         WHERE id = $alumno_evaluador;";

        $historial = DB::select($sql);

        return $historial;
    }


    public function indexalumno_evaluado($alumno_evaluado)
    {
        $sql = "SELECT mote
        FROM users 
        WHERE id = $alumno_evaluado;";

        $historial = DB::select($sql);

        return $historial;
    }

    public function createhistorial(Request $request)
    {
        $request->validate([
            'alumno_evaluador' => 'required',
            'alumno_evaluado' => 'required',
            'puntos_dados' => 'required',
            'soft_skill' => 'required'
        ]);

        $createhistorial = new historial();
        $createhistorial->id_ranking = $request->id_ranking;
        $createhistorial->alumno_evaluador = $request->alumno_evaluador;
        $createhistorial->alumno_evaluado = $request->alumno_evaluado;
        $createhistorial->puntos_dados = $request->puntos_dados;
        $createhistorial->soft_skill = $request->soft_skill;
        $createhistorial->save();
        return response()->json([
            "status" => 1,
            "message" => "Successfully",
            "value" => $createhistorial
        ]);
    }

    public function selectpuntos($id)
    {
        $sql1 = "SELECT puntos_dados
        FROM historials
        WHERE id = $id;";

        $restarevaluacion = DB::select($sql1);

        return $restarevaluacion;
    }

    public function hacerresta($puntos, $rango, $id_usuario, $id_ranking)
    {
        $sql2 = "UPDATE unite_rankings
        SET $rango = $rango - $puntos
        WHERE id_usuario = $id_usuario 
        AND id_ranking=$id_ranking;";

        $updateevaluacion = DB::select($sql2);

        return response()->json([
            "status" => 0,
            'message' => 'evalucion Successfully delete',
            "value" => $updateevaluacion
        ]);
    }

    public function deleteevaluacion($id)
    {
        $sql1 = "DELETE FROM historials
             WHERE id = $id;";

        $deleteevaluacion = DB::select($sql1);

        return $deleteevaluacion;
    }
}
