<?php

namespace App\Http\Controllers;

use App\Models\practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticaController extends Controller
{
    public function indexall(Request $request)
    {
        $sql = "SELECT users.lastname, users.date, practicas.descripcion, practicas.codigo
                FROM users, practicas
                WHERE users.id=practicas.id_profesor
                AND users.id=$request->id;";
    }
    /*public function indexPP (){
        $sql = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND users.mote='';";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }*/

    public function indexpractica($id)
    {
        $sql = "SELECT id, id_ranking, id_profesor, codigo, nombre, descripcion, puntuacion
                FROM practicas
                WHERE id_ranking = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function indexindividual($id, $id_ranking)
    {
        $sql = "SELECT id, id_profesor, codigo, nombre, descripcion, puntuacion
                FROM practicas
                WHERE id_ranking = $id_ranking
                AND id = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }

    public function practicanombre($id, $id_ranking)
    {
        $sql = "SELECT nombre
                FROM practicas
                WHERE id_ranking = $id_ranking
                AND id = $id;";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }
 

    public function createp(Request $request)
    {
        $request->validate([
            'id_profesor' => '',
            'codigo' => '',
            'nombre' => '',
            'descripcion' => '',
        ]);
        $createpractica = new practica();
        $createpractica->id_profesor = $request->id_profesor;
        $createpractica->id_ranking = $request->id_ranking;
        $createpractica->codigo = $request->codigo;
        $createpractica->nombre = $request->nombre;
        $createpractica->descripcion = $request->descripcion;
        $createpractica->puntuacion = $request->puntuacion;
        $createpractica->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully, create practica!',
            "value" => $createpractica
        ]);
    }
    public function updatep()
    {
    }
    public function deletep(Request $request, $id)
    { //elimina la practica
        $idpracticas = $id;
        $sql = "DELETE FROM practicas
                WHERE id = $idpracticas;";
        $sql2 = "DELETE FROM entregas
                WHERE id_practicas = $idpracticas;";
        $deletep2 = DB::select($sql2);
        $deletep = DB::select($sql);

        return response()->json([
            "status" => 1,
            "message" => "Actualizado correctamente",
            "Value" => $deletep,
            "Value" => $deletep2,
        ]);
    }
}
