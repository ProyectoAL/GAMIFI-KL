<?php

namespace App\Http\Controllers;

use App\Models\UniteRanking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniteRankingController extends Controller
{
    public function indexa(Request $request, $mote)
    {
        $sql = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos, create_rankings.nombre
                FROM users, unite_rankings, create_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND users.mote='$request->mote' 
                AND unite_rankings.codigo=create_rankings.codigo;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function indexall(Request $request, $codigo)
    {
        $sql2 = "SELECT users.mote, users.name, users.lastname, unite_rankings.puntos, unite_rankings.codigo
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo= '$request->codigo';";
        $viewranking = DB::select($sql2);
        return $viewranking;
    }

    public function unitedranking(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'id_usuario' => 'required',
        ]);

        $UniteRanking = new UniteRanking();
        $UniteRanking->codigo = $request->codigo;
        $UniteRanking->id_usuario = $request->id_usuario;

        $sql = "SELECT codigo
                FROM create_rankings
                WHERE codigo = '$request->codigo';";

        $consul = DB::select($sql);

        if (count($consul) == 1) {

            $sql1 = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos
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
    public function deleteuser($id) {
        $sql = "DELETE FROM unite_rankings
                WHERE EXISTS (SELECT users.id, unite_rankings.id_usuario
                FROM unite_rankings, users
                WHERE users.id=unite_rankings.id_usuario
                AND users.id=$id);";
        $CreateRanking = DB::select($sql,);
        return response()->json([
            "status" => 0,
            'message' => 'User Successfully delete',
            "value" => $CreateRanking,
        ]);
    }
    public function deleterankingu(Request $request,$id){
        UniteRanking::destroy($request->id);
        return response()->json([
            "status" => 0,
            'message' => 'Ranking Successfully delete',
        ]);
    }
}
