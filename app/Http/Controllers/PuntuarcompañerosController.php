<?php

namespace App\Http\Controllers;
use App\Models\UniteRanking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuntuarcompañerosController extends Controller
{
    public function indexusermenos($codigo, $mote){//muestra doso los usuarios del ranking que quiera puntuar menos el
        $primero="SELECT  users.mote, unite_rankings.codigo
                FROM unite_rankings, users
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo='$codigo'
                AND users.mote <> '$mote';";//mote del usuario logeado
        $consulta = DB::select($primero);
        return response()->json([

        ]);
    }
    //La p al final de los nombres de las funciones son de puntos de cada soft softkill
    public function updateResponsabilidadp(Request $request,$mote,$codigo, $puntosenv,$id_usuario){//Actualizar la puntuacion de la responsabilidad
        //id_alumno->es la id del alumno a puntuar
        //id_puntuador-> es el alumno que puntua a
        $primero="SELECT  users.mote, unite_rankings.codigo
                FROM unite_rankings, users
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo='$codigo'
                AND users.mote <> '$mote';";//mote del usuario logeado
        $consulta = DB::select($primero);
        if(count($consulta)==1){
            $selectsql ="SELECT users.mote ,unite_rankings.puntos_semanales
                        FROM users, unite_rankings
                        WHERE users.id= unite_rankings.id_usuario
                        AND users.mote= '$mote'
                        AND unite_rankings.codigo= '$codigo'
                        AND puntos_semanales < $puntosenv;";
            $consul = DB::select($selectsql);
            if(count($consul)==1){
                return response()->json([
                    "status" => 1,
                    'message' => 'No puedes enviar mas puntos de los que ya tienes',
                ]);
            }else{
                $updatesql="UPDATE unite_rankings
                            SET Responsabilidad = '$puntosenv'
                            WHERE codigo = '$codigo'
                            AND id_usuario=$id_usuario;";
                $consul2 = DB::select($updatesql);
                return response()->json([
                    "status" => 1,
                    'message' => 'se ha canviado la puntuacion',
                ]);
            }
        }
    }
    public function updateCooperaciónp(Request $request,$mote, $codigo,$puntosenv,$id_usuario){//Actualiza la puntuacion de la cooperación
        //id_alumno->es la id del alumno a puntuar
        //id_puntuador-> es el alumno que puntua a id_alumno
        $primero="SELECT  users.mote, unite_rankings.codigo
                FROM unite_rankings, users
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo='$codigo'
                AND users.mote <> '$mote';";//mote del usuario logeado
        $consulta = DB::select($primero);
        if(count($consulta)==1){
            $selectsql ="SELECT users.mote ,unite_rankings.puntos_semanales
                        FROM users, unite_rankings
                        WHERE users.id= unite_rankings.id_usuario
                        AND users.mote= '$mote'
                        AND unite_rankings.codigo= '$codigo'
                        AND puntos_semanales < $puntosenv;";
            $consul = DB::select($selectsql);
            if(count($consul)==1){
                return response()->json([
                    "status" => 1,
                    'message' => 'No puedes enviar mas puntos de los que ya tienes',
                ]);
            }else{
                $updatesql="UPDATE unite_rankings
                            SET Cooperación = '$puntosenv'
                            WHERE codigo = '$codigo'
                            AND id_usuario=$id_usuario;";
                $consul2 = DB::select($updatesql);
                return response()->json([
                    "status" => 1,
                    'message' => 'se ha canviado la puntuacion',
                ]);
            }
        }
    }
    public function updateAutonomía_e_iniciativap(Request $request,$mote, $codigo,$puntosenv,$id_usuario){//Actualiza la puntuacion de la autonomia e iniciativa
        //id_alumno->es la id del alumno a puntuar
        //id_puntuador-> es el alumno que puntua a id_alumno
        $primero="SELECT  users.mote, unite_rankings.codigo
                FROM unite_rankings, users
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo='$codigo'
                AND users.mote <> '$mote';";//mote del usuario logeado
        $consulta = DB::select($primero);
        if(count($consulta)==1){
            $selectsql ="SELECT users.mote ,unite_rankings.puntos_semanales
                        FROM users, unite_rankings
                        WHERE users.id= unite_rankings.id_usuario
                        AND users.mote= '$mote'
                        AND unite_rankings.codigo= '$codigo'
                        AND puntos_semanales < $puntosenv;";
            $consul = DB::select($selectsql);
            if(count($consul)==1){
                return response()->json([
                    "status" => 1,
                    'message' => 'No puedes enviar mas puntos de los que ya tienes',
                ]);
            }else{
                $updatesql="UPDATE unite_rankings
                            SET Autonomía_e_iniciativa = '$puntosenv'
                            WHERE codigo = '$codigo'
                            AND id_usuario=$id_usuario;";
                $consul2 = DB::select($updatesql);
                return response()->json([
                    "status" => 1,
                    'message' => 'se ha canviado la puntuacion',
                ]);
            }
        }
    }
    public function updateGestión_emocionalp(Request $request,$mote, $codigo,$puntosenv, $id_usuario){//Actualiza la puntuacion de la gestion emocional
        //id_alumno->es la id del alumno a puntuar
        //id_puntuador-> es el alumno que puntua a id_alumno

        $primero="SELECT  users.mote, unite_rankings.codigo
                FROM unite_rankings, users
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo='$codigo'
                AND users.mote <> '$mote';";//mote del usuario logeado
        $consulta = DB::select($primero);
        if(count($consulta)==1){
            $selectsql ="SELECT users.mote ,unite_rankings.puntos_semanales
                        FROM users, unite_rankings
                        WHERE users.id= unite_rankings.id_usuario
                        AND users.mote= '$mote'
                        AND unite_rankings.codigo= '$codigo'
                        AND puntos_semanales < $puntosenv;";
            $consul = DB::select($selectsql);
            if(count($consul)==1){
                return response()->json([
                    "status" => 1,
                    'message' => 'No puedes enviar mas puntos de los que ya tienes',
                ]);
            }else{
                $updatesql="UPDATE unite_rankings
                            SET Gestión_emocional = '$puntosenv'
                            WHERE codigo = '$codigo'
                            AND id_usuario=$id_usuario;";
                $consul2 = DB::select($updatesql);
                return response()->json([
                    "status" => 1,
                    'message' => 'se ha canviado la puntuacion',
                ]);
            }
        }
    }
    public function updateabilidades_de_pensamientop(Request $request,$mote, $codigo,$puntosenv,$id_usuario){//Actualiza la puntuacion de debilidades de pensamiento
        //id_alumno->es la id del alumno a puntuar
        //id_puntuador-> es el alumno que puntua a id_alumno

        $primero="SELECT  users.mote, unite_rankings.codigo
                FROM unite_rankings, users
                WHERE users.id = unite_rankings.id_usuario
                AND unite_rankings.codigo='$codigo'
                AND users.mote <> '$mote';";//mote del usuario logeado
        $consulta = DB::select($primero);
        if(count($consulta)==1){
            $selectsql ="SELECT users.mote ,unite_rankings.puntos_semanales
                        FROM users, unite_rankings
                        WHERE users.id= unite_rankings.id_usuario
                        AND users.mote= '$mote'
                        AND unite_rankings.codigo= '$codigo'
                        AND puntos_semanales < $puntosenv;";
            $consul = DB::select($selectsql);
            if(count($consul)==1){
                return response()->json([
                    "status" => 1,
                    'message' => 'No puedes enviar mas puntos de los que ya tienes',
                ]);
            }else{
                $updatesql="UPDATE unite_rankings
                            SET abilidades_de_pensamiento = '$puntosenv'
                            WHERE codigo = '$codigo'
                            AND id_usuario=$id_usuario;";
                $consul2 = DB::select($updatesql);
                return response()->json([
                    "status" => 1,
                    'message' => 'se ha canviado la puntuacion',
                ]);
            }
        }
    }
        public function updatepuntos (Request $request,$id,$puntosactual,$puntosdados){
        $resultado=$puntosactual-$puntosdados;
        $sql = "UPDATE `unite_rankings`
                SET puntos_semanales = $request->$resultado
                WHERE `unite_rankings`.`id` = $request->$id;";
        $consul2 = DB::select($sql);

    }
}
