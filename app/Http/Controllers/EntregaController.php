<?php

namespace App\Http\Controllers;

use App\Models\entrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{
    public function indexentrega(){

    }
    public function entrega (Request $request){
        $request->validate([
        'id_usuario' => '',
        'entrega' => '',
        'nota' => '',
        'id_practicas' => '',
        ]);
        $entrega = new entrega();
        $entrega->id_usuario=$request->id_usuario;
        $entrega->entrega=$request->entrega;
        $entrega->nota=$request->nota;
        $entrega->id_practicas=$request->id_practicas;
        $entrega->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully',
            "value" => $entrega
        ]);
    }
    public function actualizarnota(Request $request){
        $request->validate([
            'nota'=>'',
        ]);
        $updateentrega = new entrega();
        $updateentrega->nota=$request->nota;
        $sql = "UPDATE entregas
        SET nota = '$request->nota'
        WHERE id_usuario = $request->id_usuario;";
        $UpdateRanking = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente",
            "Value" => $UpdateRanking,
        ]);
    }
    public function deleteentrega(Request $request){
        entrega::destroy($request->id);
        return response()->json([
            "status" => 0,
            'message' => 'Ranking Successfully delete',
        ]);
    }
}
