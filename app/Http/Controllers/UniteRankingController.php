<?php

namespace App\Http\Controllers;

use App\Models\UniteRanking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniteRankingController extends Controller
{
    public function indexa (Request $request,$mote){
        $sql = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND users.mote='$mote';";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }
    public function indexall(Request $request,$codigo){
        $sql2 = "SELECT users.mote, unite_rankings.puntos
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo= '$codigo';";
        $viewranking=DB::select($sql2);
        return $viewranking;
    }
    public function unitedranking(Request $request,$mote,$codigo){
        $request->validate([
            'codigo'=>'',
            'id_usuario'=>'required',
        ]);
        $UniteRanking = new UniteRanking();
        $UniteRanking->codigo=$request->codigo;
        $UniteRanking->puntos=$request->puntos;
        $UniteRanking->id_usuario=$request->id_usuario;

        $sql="SELECT codigo
                FROM create_rankings
                WHERE codigo = '$codigo';";
        $consul = DB::select($sql);
        if(count($consul)==1){
            $sql1 = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos
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
    public function deleterankingu(Request $request,$id){
        //UniteRanking::destroy($request->id);
        $sql = "Delete * FROM create_rankings where id_usuario = $id";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }
}
