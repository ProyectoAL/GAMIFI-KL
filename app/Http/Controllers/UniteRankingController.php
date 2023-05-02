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
        $sql2 = "SELECT unite_rankings.id_usuario, users.mote, users.name, users.lastname, unite_rankings.puntos, unite_rankings.codigo, unite_rankings.id_ranking
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.id_ranking= $id ORDER BY puntos DESC;";
        $viewranking = DB::select($sql2);
        return $viewranking;
    }
    //falta por terminar
    public function unitedranking(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
            'id_usuario' => 'required',
        ]);

        $createRanking = CreateRanking::where('codigo', $request->codigo)->first();

        $UniteRanking = new UniteRanking();
        $UniteRanking->id_ranking = $createRanking->id;
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


    public function actualizarPuntosSemanales()
    {
        $fechaActual = date('Y-m-d');
        $fechaInicioSemana = date('Y-m-d', strtotime('monday this week'));

        $ranking = DB::table('unite_rankings')->distinct('id_ranking')->pluck('id_ranking');

        $usuarios = DB::table('unite_rankings')->distinct('id_usuario')->pluck('id_usuario');

        $codigo = DB::table('unite_rankings')->distinct('codigo')->pluck('codigo');

        foreach ($usuarios as $usuario) {
            $puntosSemanaActual = DB::table('unite_rankings')
                ->where('id_usuario', $usuario)
                ->where('created_at', '>=', $fechaInicioSemana)
                ->sum('puntos');

            $puntosFaltantes = max(0, 1000 - $puntosSemanaActual);

            DB::table('unite_rankings')->insert([
                'id_ranking' => $ranking,
                'codigo' => $codigo,
                'puntos' => $puntosFaltantes,
                'id_usuario' => $usuario,
                'created_at' => $fechaActual,
                'updated_at' => $fechaActual
            ]);
        }
    }
}
