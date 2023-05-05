<?php

namespace App\Http\Controllers;

use App\Models\UniteRanking;
use Illuminate\Http\Request;
use App\Models\CreateRanking;
use Illuminate\Support\Facades\DB;

class UniteRankingController extends Controller
{
    public function indexa (Request $request){//muestra todos los rankings unidos por el alumno
        $sql = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.Responsabilidad, unite_rankings.Cooperación, unite_rankings.Autonomía_e_iniciativa, unite_rankings.Gestión_emocional, unite_rankings.abilidades_de_pensamiento, unite_rankings.puntos_semanales
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND users.mote='$request->mote';";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }
    public function indexall(Request $request){//muestra todos los alumnos
        $sql2 = "SELECT users.mote, unite_rankings.Responsabilidad, unite_rankings.Cooperación, unite_rankings.Autonomía_e_iniciativa, unite_rankings.Gestión_emocional, unite_rankings.abilidades_de_pensamiento, unite_rankings.puntos_semanales
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo= '$request->codigo';";
        $viewranking=DB::select($sql2);
        return $viewranking;
    }
    public function unitedranking(Request $request,$mote,$codigo){//poder hacer que los usuarios puedan unirse al ranking
        $request->validate([
            'codigo'=>'',
            'id_usuario'=>'required',
        ]);
        $createRanking = CreateRanking::where('codigo', $request->codigo)->first();

        $UniteRanking = new UniteRanking();
        $UniteRanking->id_ranking = $createRanking->id;
        $UniteRanking->codigo = $request->codigo;
        $UniteRanking->Responsabilidad=$request->Responsabilidad;
        $UniteRanking->Cooperación=$request->Cooperación;
        $UniteRanking->Autonomía_e_iniciativa=$request->Autonomía_e_iniciativa;
        $UniteRanking->Gestión_emocional=$request->Gestión_emocional;
        $UniteRanking->abilidades_de_pensamiento=$request->abilidades_de_pensamiento;
        $UniteRanking->puntos_semanales=$request->puntos_semanales;
        $UniteRanking->id_usuario = $request->id_usuario;
        $sql="SELECT codigo
                FROM create_rankings
                WHERE codigo = '$codigo';";
        $consul = DB::select($sql);
        if(count($consul)==1){
            $sql1 = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos_semanales
            FROM users, unite_rankings
            WHERE users.id = unite_rankings.id_usuario
            AND users.mote='$mote'
            AND unite_rankings.codigo='$codigo';";
            $consul2 = DB::select($sql1);

            if(count($consul2)==1 ){
                return response()->json([
                    "status" => 1,
                    'message' => 'You are already in the ranking',
                ]);
            }else{
                $UniteRanking->save();
                return response()->json([
                    "status" => 1,
                    'message' => 'Successfully, united Ranking!',
                    "value" => $UniteRanking
                ]);
            }
        }else{
            return response()->json([
                "status" => 0,
                'message' => 'Code not found',
            ]);
        }
    }
    public function deleteuser(Request $request) {//eliminar usuario del ranking
        $CreateRanking = DB::table('unite_rankings')
        ->where('id_usuario', '=', $request->id)
        ->delete();
        return response()->json([
            "status" => 0,
            'message' => 'User Successfully delete',
            "value" => $CreateRanking
        ]);
    }
    public function deleterankingu(Request $request,$id){//eliminar el ranking
        UniteRanking::destroy($request->id);
        return response()->json([
            "status" => 0,
            'message' => 'Ranking Successfully delete',
        ]);
    }
}
