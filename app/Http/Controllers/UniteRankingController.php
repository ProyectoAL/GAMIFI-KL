<?php

namespace App\Http\Controllers;

use App\Models\UniteRanking;
use Illuminate\Http\Request;
use App\Models\CreateRanking;
use Illuminate\Support\Facades\DB;

class UniteRankingController extends Controller
{
    public function indexnombreranking($id)
    {
        $sql = "SELECT create_rankings.nombre, unite_rankings.codigo, create_rankings.id
                FROM create_rankings, unite_rankings
                WHERE  unite_rankings.id_ranking = create_rankings.id
                AND unite_rankings.id_usuario = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function indexall($id)
    {
        $sql2 = "SELECT unite_rankings.id_usuario, users.mote, users.name, users.lastname, unite_rankings.puntos_semanales, unite_rankings.codigo, unite_rankings.id_ranking,
        unite_rankings.Responsabilidad, unite_rankings.Cooperacion, unite_rankings.Autonomia_e_iniciativa, unite_rankings.Gestion_emocional, unite_rankings.abilidades_de_pensamiento
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.id_ranking= $id ORDER BY mote_usuario ASC;";
        $viewranking = DB::select($sql2);
        return $viewranking;
    }

    public function indexespecifico($id_usuario, $id_ranking)
    {
        $sql2 = "SELECT unite_rankings.id_usuario, unite_rankings.puntos_semanales, unite_rankings.codigo, unite_rankings.id_ranking,
        unite_rankings.Responsabilidad, unite_rankings.Cooperacion, unite_rankings.Autonomia_e_iniciativa, unite_rankings.Gestion_emocional, unite_rankings.abilidades_de_pensamiento
                FROM unite_rankings
                WHERE unite_rankings.id_usuario != $id_usuario
                AND unite_rankings.id_ranking = $id_ranking;";
        $viewranking = DB::select($sql2);
        return $viewranking;
    }

    public function motealumnos($id_usuario, $id_ranking)
    {
        $sql = "SELECT unite_rankings.id_usuario, users.mote, users.name, users.lastname, unite_rankings.puntos_semanales, unite_rankings.codigo, unite_rankings.id_ranking,
        unite_rankings.Responsabilidad, unite_rankings.Cooperacion, unite_rankings.Autonomia_e_iniciativa, unite_rankings.Gestion_emocional, unite_rankings.abilidades_de_pensamiento
                FROM users, unite_rankings
                WHERE users.id = $id_usuario
                AND unite_rankings.id_ranking= $id_ranking
                AND unite_rankings.id_usuario = $id_usuario;";

        $viewranking = DB::select($sql);

        return $viewranking;
    }

    //falta por terminar
    public function unitedranking(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'id_usuario' => 'required',
            'mote' => 'required'
        ]);

        $createRanking = CreateRanking::where('codigo', $request->codigo)->first();

        $UniteRanking = new UniteRanking();
        $UniteRanking->id_ranking = $createRanking->id;
        $UniteRanking->codigo = $request->codigo;
        $UniteRanking->id_usuario = $request->id_usuario;
        $UniteRanking->mote_usuario = $request->mote;

        $sql = "SELECT codigo
                FROM create_rankings
                WHERE codigo = '$request->codigo';";

        $consul = DB::select($sql);

        if (count($consul) == 1) {

            $sql1 = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos_semanales
            FROM users, unite_rankings
            WHERE users.id = unite_rankings.id_usuario
            AND users.mote='$request->mote'
            AND unite_rankings.codigo='$request->codigo';";

            $consul2 = DB::select($sql1);

            if (count($consul2) == 1) {
                return response()->json([
                    "status" => 1,
                    'message' => 'You are already in the ranking',
                ]);
            } else {
                $UniteRanking->save();
                return response()->json([
                    "status" => 1,
                    'message' => 'Successfully, united Ranking!',
                    "value" => $UniteRanking
                ]);
            }
        } else {
            return response()->json([
                "status" => 0,
                'message' => 'Code not found',
            ]);
        }
    }

    public function updatepuntosmedallas(Request $request)
    {

        $updateRanking = new CreateRanking();

        $sql = "UPDATE unite_rankings
                SET $request->rango = $request->rango + $request->puntos
                WHERE mote_usuario = '$request->mote_usuario' AND 
                id_ranking=$request->id_ranking;";

        $updateRanking = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente",
            "value" => $updateRanking
        ]);
    }

    public function deleteuser(Request $request)
    {

        $sql1 = "DELETE FROM entregas
            WHERE id_usuario = $request->id_usuario 
            AND id_ranking = $request->id_ranking;";

        $sql2 = "DELETE FROM unite_rankings
            WHERE id_usuario =  $request->id_usuario
            AND id_ranking = $request->id_ranking;";

        $deleteentrega = DB::select($sql1);
        $deleteusuario = DB::select($sql2);

        return response()->json([
            "status" => 0,
            'message' => 'User Successfully delete',
            "value1" => $deleteentrega,
            "value2" => $deleteusuario
        ]);
    }
}
