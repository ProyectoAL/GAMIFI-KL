<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CreateRanking;
use Illuminate\Support\Facades\DB;

class CreateRankingController extends Controller
{
    public function indexranking(Request $request,$mote){
        //$CreateRanking=CreateRanking::all();
        $sql = "SELECT users.id, users.mote, create_rankings.id, create_rankings.codigo, create_rankings.nombre, create_rankings.id_profesor
                FROM users, create_rankings
                WHERE users.id= create_rankings.id_profesor
                AND users.mote='$mote';";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }
    public function Createranking(Request $request){
        $request->validate([
            'codigo'=>'',
            'nombre'=>'required',
            'id_profesor'=>'required',
        ]);
        $CreateRanking = new CreateRanking;
        $CreateRanking->codigo=$request->codigo;
        $CreateRanking->nombre=$request->nombre;
        $CreateRanking->id_profesor=$request->id_profesor;
        if(empty($CreateRanking->codigo)){
            $CreateRanking->codigo=Str::random(10);
        }else{

        }
        $CreateRanking->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully, created Ranking!',
            "value" => $CreateRanking
        ]);
    }
    public function updateranking(Request $request, $id){
        $request->validate([
            'codigo' => '',
            'nombre'=>'',
        ]);
        $UpdateRanking = $id;
        if (CreateRanking::where(["id" => $UpdateRanking])->exists()) {
            $UpdateRanking = CreateRanking::find($UpdateRanking);
            $UpdateRanking->codigo=$request->codigo;
            if(empty($UpdateRanking->codigo)){
                $UpdateRanking->codigo=Str::random(10);
            }else{

            }
            $UpdateRanking->nombre=$request->nombre;
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
    public function deleteranking(Request $request){
        CreateRanking::destroy($request->id);
    }
}
