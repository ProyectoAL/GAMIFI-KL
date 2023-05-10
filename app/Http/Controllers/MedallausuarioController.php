<?php

namespace App\Http\Controllers;

use App\Models\Soft_Skills;
use App\Models\UniteRanking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedallausuarioController extends Controller
{
    public function selectResponsabilidad(Request $request, $puntos)
    { //actualizar las medallas de los usuarios
        $puntosresponsabilidad = $puntos;
        if ($puntosresponsabilidad == 0 || $puntosresponsabilidad > 0 && $puntosresponsabilidad < 1000) {
            $sql0 = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'Responsabilidad'
                    AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul0 = DB::select($sql0);
            return response()->json([
                "status" => 1,
                "message" => "Responsabilidad nivel 0",
                "value" => $consul0
            ]);
        } else if ($puntosresponsabilidad == 1000 || $puntosresponsabilidad > 1000 && $puntosresponsabilidad < 2000) {
            $sql1 = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'Responsabilidad'
                    AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul1 = DB::select($sql1);
            return response()->json([
                "status" => 1,
                "message" => "Responsabilidad nivel 1",
                "value" => $consul1
            ]);
        } else if ($puntosresponsabilidad == 2000 || $puntosresponsabilidad > 2000 && $puntosresponsabilidad < 4000) {
            $sql2 = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'Responsabilidad'
                    AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul2 = DB::select($sql2);
            return response()->json([
                "status" => 1,
                "message" => "Responsabilidad nivel 2",
                "value" => $consul2
            ]);
        } else if ($puntosresponsabilidad == 4000 || $puntosresponsabilidad > 4000 && $puntosresponsabilidad < 7000) {
            $sql3 = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'Responsabilidad'
                    AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul3 = DB::select($sql3);
            return response()->json([
                "status" => 1,
                "message" => "Responsabilidad nivel 3",
                "value" => $consul3
            ]);
        } else if ($puntosresponsabilidad == 7000 || $puntosresponsabilidad > 7000 && $puntosresponsabilidad < 10000) {
            $sql4 = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'Responsabilidad'
                    AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul4 = DB::select($sql4);
            return response()->json([
                "status" => 1,
                "message" => "Responsabilidad nivel 4",
                "value" => $consul4
            ]);
        } else if ($puntosresponsabilidad == 10000 || $puntosresponsabilidad > 10000) {
            $sql5 = "SELECT soft__skills.medalla
                    FROM soft__skills
                    WHERE soft__skills.rango = 'Responsabilidad'
                    AND soft__skills.puntosr>=10000;";

            $consul5 = DB::select($sql5);
            return response()->json([
                "status" => 1,
                "message" => "Responsabilidad nivel 5",
                "value" => $consul5
            ]);
        }
    }
    public function selectCooperacion(Request $request, $puntos)
    { //actualizar las medallas de los usuarios
        $puntoscooperacion = $puntos;
        if ($puntoscooperacion == 0 || $puntoscooperacion > 0 && $puntoscooperacion < 1000) {
            $sql0 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Cooperación'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul0 = DB::select($sql0);
            return response()->json([
                "status" => 1,
                "message" => "Cooperación nivel 0",
                "value" => $consul0
            ]);
        } else if ($puntoscooperacion == 1000 || $puntoscooperacion > 1000 && $puntoscooperacion < 2000) {
            $sql1 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Cooperación'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul1 = DB::select($sql1);
            return response()->json([
                "status" => 1,
                "message" => "Cooperación nivel 1",
                "value" => $consul1
            ]);
        } else if ($puntoscooperacion == 2000 || $puntoscooperacion > 2000 && $puntoscooperacion < 4000) {
            $sql2 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Cooperación'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul2 = DB::select($sql2);
            return response()->json([
                "status" => 1,
                "message" => "Cooperación nivel 2",
                "value" => $consul2
            ]);
        } else if ($puntoscooperacion == 4000 || $puntoscooperacion > 4000 && $puntoscooperacion < 7000) {
            $sql3 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Cooperación'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul3 = DB::select($sql3);
            return response()->json([
                "status" => 1,
                "message" => "Cooperación nivel 3",
                "value" => $consul3
            ]);
        } else if ($puntoscooperacion == 7000 || $puntoscooperacion > 7000 && $puntoscooperacion < 10000) {
            $sql4 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Cooperación'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul4 = DB::select($sql4);
            return response()->json([
                "status" => 1,
                "message" => "Cooperación nivel 5",
                "value" => $consul4
            ]);
        } else if ($puntoscooperacion == 10000 || $puntoscooperacion > 10000) {
            $sql5 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Cooperación'
            AND soft__skills.puntosr>=10000;";

            $consul5 = DB::select($sql5);
            return response()->json([
                "status" => 1,
                "message" => "Cooperación nivel 5",
                "value" => $consul5
            ]);
        }
    }
    public function selectAutonomia_e_iniciativa(Request $request, $puntos)
    { //actualizar las medallas de los usuarios
        $puntosautonomía_e_iniciativa = $puntos;
        if ($puntosautonomía_e_iniciativa == 0 || $puntosautonomía_e_iniciativa > 0 && $puntosautonomía_e_iniciativa < 1000) {
            $sql0 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul0 = DB::select($sql0);
            return response()->json([
                "status" => 1,
                "message" => "Autonomía e iniciativa nivel 0",
                "value" => $consul0
            ]);
        } else if ($puntosautonomía_e_iniciativa == 1000 || $puntosautonomía_e_iniciativa > 1000 && $puntosautonomía_e_iniciativa < 2000) {
            $sql1 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul1 = DB::select($sql1);
            return response()->json([
                "status" => 1,
                "message" => "Autonomía e iniciativa nivel 1",
                "value" => $consul1
            ]);
        } else if ($puntosautonomía_e_iniciativa == 2000 || $puntosautonomía_e_iniciativa > 2000 && $puntosautonomía_e_iniciativa < 4000) {
            $sql2 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul2 = DB::select($sql2);
            return response()->json([
                "status" => 1,
                "message" => "Autonomía e iniciativa nivel 2",
                "value" => $consul2
            ]);
        } else if ($puntosautonomía_e_iniciativa == 4000 || $puntosautonomía_e_iniciativa > 4000 && $puntosautonomía_e_iniciativa < 7000) {
            $sql3 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul3 = DB::select($sql3);
            return response()->json([
                "status" => 1,
                "message" => "Autonomía e iniciativa nivel 3",
                "value" => $consul3
            ]);
        } else if ($puntosautonomía_e_iniciativa == 7000 || $puntosautonomía_e_iniciativa > 7000 && $puntosautonomía_e_iniciativa < 10000) {
            $sql4 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Autonomía e iniciativa'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul4 = DB::select($sql4);
            return response()->json([
                "status" => 1,
                "message" => "Autonomía e iniciativa nivel 4",
                "value" => $consul4
            ]);
        } else if ($puntosautonomía_e_iniciativa == 10000 || $puntosautonomía_e_iniciativa > 10000) {
            $sql5 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Autonomía e iniciativa'
            AND soft__skills.puntosr>=10000;";

            $consul5 = DB::select($sql5);
            return response()->json([
                "status" => 1,
                "message" => "Autonomía e iniciativa nivel 5",
                "value" => $consul5
            ]);
        }
    }
    public function selectGestion_emocional(Request $request, $puntos)
    { //actualizar las medallas de los usuarios
        $puntosegstión_emocional = $puntos;
        if ($puntosegstión_emocional == 0 || $puntosegstión_emocional > 0 && $puntosegstión_emocional < 1000) {
            $sql0 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Gestión emocional'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul0 = DB::select($sql0);
            return response()->json([
                "status" => 1,
                "message" => "Gestión emocional nivel 0",
                "value" => $consul0
            ]);
        } else if ($puntosegstión_emocional == 1000 || $puntosegstión_emocional > 1000 && $puntosegstión_emocional < 2000) {
            $sql1 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Gestión emocional'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul1 = DB::select($sql1);
            return response()->json([
                "status" => 1,
                "message" => "Gestión emocional nivel 1",
                "value" => $consul1
            ]);
        } else if ($puntosegstión_emocional == 2000 || $puntosegstión_emocional > 2000 && $puntosegstión_emocional < 4000) {
            $sql2 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Gestión emocional'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul2 = DB::select($sql2);
            return response()->json([
                "status" => 1,
                "message" => "Gestión emocional nivel 2",
                "value" => $consul2
            ]);
        } else if ($puntosegstión_emocional == 4000 || $puntosegstión_emocional > 4000 && $puntosegstión_emocional < 7000) {
            $sql3 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Gestión emocional'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul3 = DB::select($sql3);
            return response()->json([
                "status" => 1,
                "message" => "Gestión emocional nivel 3",
                "value" => $consul3
            ]);
        } else if ($puntosegstión_emocional == 7000 || $puntosegstión_emocional > 7000 && $puntosegstión_emocional < 10000) {
            $sql4 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Gestión emocional'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul4 = DB::select($sql4);
            return response()->json([
                "status" => 1,
                "message" => "Gestión emocional nivel 4",
                "value" => $consul4
            ]);
        } else if ($puntosegstión_emocional == 10000 || $puntosegstión_emocional > 10000) {
            $sql5 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Gestión emocional'
            AND soft__skills.puntosr>=10000;";

            $consul5 = DB::select($sql5);
            return response()->json([
                "status" => 1,
                "message" => "Gestión emocional nivel 5",
                "value" => $consul5
            ]);
        }
    }
    public function selectHabilidades_de_pensamiento(Request $request, $puntos)
    { //actualizar las medallas de los usuarios
        $puntoshabilidades_de_pensamiento = $puntos;
        if ($puntoshabilidades_de_pensamiento == 0 || $puntoshabilidades_de_pensamiento > 0 && $puntoshabilidades_de_pensamiento < 1000) {
            $sql0 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 0 and 999;";

            $consul0 = DB::select($sql0);
            return response()->json([
                "status" => 1,
                "message" => "Habilidades de pensamiento nivel 0",
                "value" => $consul0
            ]);
        } else if ($puntoshabilidades_de_pensamiento == 1000 || $puntoshabilidades_de_pensamiento > 1000 && $puntoshabilidades_de_pensamiento < 2000) {
            $sql1 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 1000 and 1999;";

            $consul1 = DB::select($sql1);
            return response()->json([
                "status" => 1,
                "message" => "Habilidades de pensamiento nivel 1",
                "value" => $consul1
            ]);
        } else if ($puntoshabilidades_de_pensamiento == 2000 || $puntoshabilidades_de_pensamiento > 2000 && $puntoshabilidades_de_pensamiento < 4000) {
            $sql2 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 2000 and 3999;";

            $consul2 = DB::select($sql2);
            return response()->json([
                "status" => 1,
                "message" => "Habilidades de pensamiento nivel 2",
                "value" => $consul2
            ]);
        } else if ($puntoshabilidades_de_pensamiento == 4000 || $puntoshabilidades_de_pensamiento > 4000 && $puntoshabilidades_de_pensamiento < 7000) {
            $sql3 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 4000 and 6999;";

            $consul3 = DB::select($sql3);
            return response()->json([
                "status" => 1,
                "message" => "Habilidades de pensamiento nivel 3",
                "value" => $consul3
            ]);
        } else if ($puntoshabilidades_de_pensamiento == 7000 || $puntoshabilidades_de_pensamiento > 7000 && $puntoshabilidades_de_pensamiento < 10000) {
            $sql4 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Habilidades de pensamiento'
            AND soft__skills.puntosr BETWEEN 7000 and 9999;";

            $consul4 = DB::select($sql4);
            return response()->json([
                "status" => 1,
                "message" => "Habilidades de pensamiento nivel 4",
                "value" => $consul4
            ]);
        } else if ($puntoshabilidades_de_pensamiento == 10000 || $puntoshabilidades_de_pensamiento > 10000) {
            $sql5 = "SELECT soft__skills.medalla
            FROM soft__skills
            WHERE soft__skills.rango = 'Habilidades de pensamiento'
            AND soft__skills.puntosr>=10000;";

            $consul5 = DB::select($sql5);
            return response()->json([
                "status" => 1,
                "message" => "Habilidades de pensamiento nivel 5",
                "value" => $consul5
            ]);
        }
    }
}
