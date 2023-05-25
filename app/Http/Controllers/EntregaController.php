<?php

namespace App\Http\Controllers;

use App\Models\entrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{
    public function indexentrega($id)
    { //Los usuarios podran ver las practicas del ranking
        $sql = "SELECT id, id_usuario, mote, nombre, lastname, entrega, nota, id_practicas, id_ranking
        FROM entregas
        WHERE id_practicas = $id;";
        $entrega = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Todos los rakings unidos",
            "Value" => $entrega
        ]);
    }

    public function indexentregaAlumno($id, $id_usuario)
    { //Los usuarios podran ver las practicas del ranking
        $sql = "SELECT id, id_usuario, mote, nombre, lastname, entrega, nota, id_practicas
        FROM entregas
        WHERE id_practicas = $id 
        AND id_usuario = $id_usuario;";
        $entrega = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Todos los rakings unidos",
            "Value" => $entrega
        ]);
    }

    public function entrega(Request $request)
    {
        $request->validate([
            'id_usuario' => '',
            'entrega' => '',
            'mote' => '',
            'nombre' => '',
            'lastname' => '',
            'nota' => '',
            'id_practicas' => '',
            'id_ranking' => ''
        ]);
        $entrega = new entrega();
        $entrega->id_usuario = $request->id_usuario;
        $entrega->entrega = $request->entrega;
        $entrega->mote = $request->mote;
        $entrega->nombre = $request->nombre;
        $entrega->lastname = $request->lastname;
        $entrega->nota = $request->nota;
        $entrega->id_practicas = $request->id_practicas;
        $entrega->id_ranking = $request->id_ranking;
        $entrega->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully',
            "value" => $entrega
        ]);
    }

    public function actualizarentrega(Request $request)
    {
        $request->validate([
            'entrega' => '',
        ]);
        $updateentrega = new entrega();
        $updateentrega->nota = $request->entrega;
        $sql = "UPDATE entregas
        SET entrega = '$request->entrega'
        WHERE id_usuario = $request->id_usuario;";
        $UpdateRanking = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente la entrega",
            "Value" => $UpdateRanking,
        ]);
    }

    public function actualizarnota(Request $request)
    {
        $request->validate([
            'nota' => '',
        ]);
        $updateentrega = new entrega();
        $updateentrega->nota = $request->nota;
        $sql = "UPDATE entregas
        SET nota = '$request->nota'
        WHERE id = $request->id;";

        $UpdateRanking = DB::select($sql);
        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente",
            "Value" => $UpdateRanking,
        ]);
    }

    public function deleteentrega(Request $request)
    {
        entrega::destroy($request->id);
        return response()->json([
            "status" => 0,
            'message' => 'Ranking Successfully delete',
        ]);
    }
}
