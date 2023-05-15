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
        $sql = "SELECT puntos_dados
        FROM historials
        WHERE id = $id;";

        $restarevaluacion = DB::select($sql);

        return $restarevaluacion;
    }

    public function hacerresta(Request $request)
    {
        $sql = "UPDATE unite_rankings
        SET $request->rango = $request->rango - $request->puntos
        WHERE unite_rankings.id_usuario = $request->id_usuario 
        AND unite_rankings.id_ranking=$request->id_ranking;";

        $updateevaluacion = DB::select($sql);

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

    public function filtro($dato)
    {

        $sql = "SELECT id, id_ranking, alumno_evaluador, alumno_evaluado, puntos_dados, soft_skill, created_at, updated_at 
        FROM historials 
        WHERE alumno_evaluador LIKE '%$dato%' 
            OR alumno_evaluado LIKE '%$dato%' 
            OR puntos_dados LIKE '%$dato%' 
            OR soft_skill LIKE '%$dato%' 
            OR created_at LIKE '%$dato%';";
        $consul = DB::select($sql);
        return $consul;
    }
}
