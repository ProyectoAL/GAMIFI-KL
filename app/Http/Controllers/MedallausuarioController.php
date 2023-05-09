<?php

namespace App\Http\Controllers;

use App\Models\Soft_Skills;
use App\Models\UniteRanking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedallausuarioController extends Controller
{
    public function selectResponsabilidad(Request $request, $puntos){//actualizar las medallas de los usuarios
        $puntosresponsabilidad=$puntos;
        if($puntosresponsabilidad > 0 || $puntosresponsabilidad <999){
            $sql = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'responsabilidad'
                    AND soft__skills.puntosr BETWEEN 0 and 999;";

                    $consul = DB::select($sql);
                    return response()->json([
                        "status" => 1,
                        "message" => "Actualizado correctamente",
                        "value" => $consul
                    ]);
        }else if($puntosresponsabilidad > 1000 || $puntosresponsabilidad <1999){
            $sql = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'responsabilidad'
                    AND soft__skills.puntosr BETWEEN 1000 and 1999;";

                    $consul = DB::select($sql);
                    return response()->json([
                        "status" => 1,
                        "message" => "Actualizado correctamente",
                        "value" => $consul
                    ]);
        }else if($puntosresponsabilidad >= 2000 || $puntosresponsabilidad <3999){
            $sql = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'responsabilidad'
                    AND soft__skills.puntosr BETWEEN 2000 and 3999;";

                    $consul = DB::select($sql);
                    return response()->json([
                        "status" => 1,
                        "message" => "Actualizado correctamente",
                        "value" => $consul
                    ]);
        }else if($puntosresponsabilidad >=4000 || $puntosresponsabilidad <6999){
            $sql = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'responsabilidad'
                    AND soft__skills.puntosr BETWEEN 4000 and 6999;";

                    $consul = DB::select($sql);
                    return response()->json([
                        "status" => 1,
                        "message" => "Actualizado correctamente",
                        "value" => $consul
                    ]);
        }else if($puntosresponsabilidad >=7000 || $puntosresponsabilidad <9999){
            $sql = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'responsabilidad'
                    AND soft__skills.puntosr BETWEEN 7000 and 9999;";

                    $consul = DB::select($sql);
                    return response()->json([
                        "status" => 1,
                        "message" => "Actualizado correctamente",
                        "value" => $consul
                    ]);
        }else if($puntosresponsabilidad >=10000){
            $sql = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'responsabilidad'
                    AND soft__skills.puntosr>=10000;";

                    $consul = DB::select($sql);
                    return response()->json([
                        "status" => 1,
                        "message" => "Actualizado correctamente",
                        "value" => $consul
                    ]);
        }

    }
    public function selectCooperación(Request $request, $puntos){//actualizar las medallas de los usuarios
        $puntoscooperacion=$puntos;
        if($puntoscooperacion > 0 || $puntoscooperacion <999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'cooperación'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoscooperacion > 1000 || $puntoscooperacion <1999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'cooperación'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoscooperacion >= 2000 || $puntoscooperacion <3999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'cooperación'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoscooperacion >=4000 || $puntoscooperacion <6999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'cooperación'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoscooperacion >=7000 || $puntoscooperacion <9999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'cooperación'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoscooperacion >=10000){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'cooperación'
            AND soft__skills.puntosr>=10000;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }
    }
    public function selectAutonomía_e_iniciativa(Request $request, $puntos){//actualizar las medallas de los usuarios
        $puntosautonomía_e_iniciativa=$puntos;
        if($puntosautonomía_e_iniciativa > 0 || $puntosautonomía_e_iniciativa <999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosautonomía_e_iniciativa > 1000 || $puntosautonomía_e_iniciativa <1999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosautonomía_e_iniciativa >= 2000 || $puntosautonomía_e_iniciativa <3999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosautonomía_e_iniciativa >=4000 || $puntosautonomía_e_iniciativa <6999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosautonomía_e_iniciativa >=7000 || $puntosautonomía_e_iniciativa <9999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosautonomía_e_iniciativa >=10000){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'autonomía e iniciativa'
            AND soft__skills.puntosr>=10000;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }
    }
    public function selectGestión_emocional(Request $request, $puntos){//actualizar las medallas de los usuarios
        $puntosegstión_emocional=$puntos;
        if($puntosegstión_emocional > 0 || $puntosegstión_emocional <999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'gestión emocional'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosegstión_emocional > 1000 || $puntosegstión_emocional <1999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'gestión emocional'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosegstión_emocional >= 2000 || $puntosegstión_emocional <3999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'gestión emocional'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosegstión_emocional >=4000 || $puntosegstión_emocional <6999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'gestión emocional'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosegstión_emocional >=7000 || $puntosegstión_emocional <9999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'gestión emocional'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntosegstión_emocional >=10000){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'gestión emocional'
            AND soft__skills.puntosr>=10000;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }
    }
    public function selectHabilidades_de_pensamiento(Request $request, $puntos){//actualizar las medallas de los usuarios
        $puntoshabilidades_de_pensamiento=$puntos;
        if($puntoshabilidades_de_pensamiento > 0 || $puntoshabilidades_de_pensamiento <999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoshabilidades_de_pensamiento > 1000 || $puntoshabilidades_de_pensamiento <1999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoshabilidades_de_pensamiento >= 2000 || $puntoshabilidades_de_pensamiento <3999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoshabilidades_de_pensamiento >=4000 || $puntoshabilidades_de_pensamiento <6999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoshabilidades_de_pensamiento >=7000 || $puntoshabilidades_de_pensamiento <9999){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }else if($puntoshabilidades_de_pensamiento >=10000){
            $sql = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'habilidades de pensamiento'
            AND soft__skills.puntosr>=10000;";

            $consul = DB::select($sql);
            return response()->json([
                "status" => 1,
                "message" => "Actualizado correctamente",
                "value" => $consul
            ]);
        }
    }
}
