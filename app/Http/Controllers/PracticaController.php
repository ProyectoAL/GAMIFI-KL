<?php

namespace App\Http\Controllers;

use App\Models\practica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticaController extends Controller
{
    public function indexall (){
        $sql = "SELECT users.lastname, users.date, practicas.descripcion, practicas.codigo
                FROM users, practicas
                WHERE users.id=practicas.id_profesor
                AND users.id=1;";
    }
    /*public function indexPP (){
        $sql = "SELECT users.id, users.mote, unite_rankings.codigo, unite_rankings.puntos
                FROM users, unite_rankings
                WHERE users.id = unite_rankings.id_usuario
                AND users.mote='';";
        $CreateRanking = DB::select($sql);
        return $CreateRanking;
    }*/
    public function createp (Request $request){
        $request->validate([
            'id_profesor'=>'',
            'codigo'=>'',
            'nombre'=>'',
            'descripcion'=>'',
            'puntuacion'=>'',
        ]);
        $createpractica = new practica();
        $createpractica->id_profesor=$request->id_profesor;
        $createpractica->codigo=$request->codigo;
        $createpractica->nombre=$request->nombre;
        $createpractica->descripcion=$request->descripcion;
        $createpractica->puntuacion=$request->puntuacion;
        $createpractica->save();
        return response()->json([
            "status" => 1,
            'message' => 'Successfully, create practica!',
            "value" => $createpractica
        ]);
    }
    public function updatep (){

    }
    public function deletep (Request $request){
        practica::destroy($request->id);
    }
}
