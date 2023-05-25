<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CreateRanking;
use Illuminate\Support\Facades\DB;

class CreateRankingController extends Controller
{
    public function indexranking(Request $request, $mote)
    {
        //$CreateRanking=CreateRanking::all();
        $sql = "SELECT users.id, users.mote, create_rankings.id, create_rankings.codigo, create_rankings.nombre, create_rankings.id_profesor
                FROM users, create_rankings
                WHERE users.id = create_rankings.id_profesor
                AND users.mote='$mote';";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function index($id)
    {
        //$CreateRanking=CreateRanking::all();
        $sql = "SELECT id, nombre, codigo
                FROM create_rankings
                WHERE id= $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }


    public function Createranking(Request $request)
    {
        $request->validate([
            'codigo' => '',
            'nombre' => 'required',
            'id_profesor' => 'required',
        ]);
        $CreateRanking = new CreateRanking;
        $CreateRanking->codigo = $request->codigo;
        $CreateRanking->nombre = $request->nombre;
        $CreateRanking->id_profesor = $request->id_profesor;
        if (empty($CreateRanking->codigo)) {
            $CreateRanking->codigo = Str::random(10);
        } else {
        }
        $CreateRanking->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully, created Ranking!',
            "value" => $CreateRanking
        ]);
    }
    public function updaterankingcode(Request $request, $id)
    { //Genera un nuevo codigo
        $request->validate([
            'codigo' => '',
        ]);
        $UpdateRanking = $id;
        if (CreateRanking::where(["id" => $UpdateRanking])->exists()) {
            $UpdateRanking = CreateRanking::find($UpdateRanking);
            $UpdateRanking->codigo = $request->codigo;
            if (empty($UpdateRanking->codigo)) {
                $UpdateRanking->codigo = Str::random(10);
            } else {
            }
            $UpdateRanking->save();
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $UpdateRanking
            ]);
        } else {
            return response()->json([
                "status" => 1,
                "message" => "No se pùdo actucalizar",
            ]);
        }
    }


    //faltapor terminar
    public function updateranking(Request $request)
    { //Actualiza los codigos del ranquing
        $request->validate([
            'codigo' => '',
        ]);
        $updateRanking = new CreateRanking();
        $updateRanking->codigo = $request->codigo;

        $sql = "UPDATE unite_rankings
                SET codigo = '$request->codigo'
                WHERE unite_rankings.id_ranking=$request->id_ranking;";
        $sql2 = "UPDATE practicas
                SET codigo = '$request->codigo'
                WHERE practicas.id_ranking = $request->id_ranking AND practicas.id_profesor = $request->id_usuario;";

        $updateRanking = DB::select($sql);
        $updateRanking2 = DB::select($sql2);
        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente",
            "Value" => $updateRanking,
            "Value2" => $updateRanking2,
        ]);
    }


    public function updatenombre(Request $request)
    { //Actualiza los codigos del ranquing
        $request->validate([
            'nombre' => '',
        ]);
        $updateRanking = new CreateRanking();
        $updateRanking->nombre = $request->nombre;

        $sql = "UPDATE create_rankings
                SET nombre = '$request->nombre'
                WHERE id = $request->id;";

        $updateRanking = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente",
            "value" => $updateRanking
        ]);
    }

    public function deleteranking(Request $request)
    {

        $sql1 = "DELETE FROM entregas
            WHERE id_ranking = $request->id_ranking;";
        $sql2 = "DELETE FROM practicas
            WHERE id_ranking = $request->id_ranking;";
        $sql3 = "DELETE FROM unite_rankings
            WHERE id_ranking = $request->id_ranking;";
        $sql4 = "DELETE FROM create_rankings
            WHERE id = $request->id_ranking;";

        $deleteentregas = DB::select($sql1);
        $deletepracticas = DB::select($sql2);
        $deleteuniteusers = DB::select($sql3);
        $deleterankings = DB::select($sql4);

        return response()->json([
            "status" => 0,
            'message' => 'User Successfully delete',
            "value1" => $deleteentregas,
            "value2" => $deletepracticas,
            "value3" => $deleteuniteusers,
            "value4" => $deleterankings
        ]);
    }
}
