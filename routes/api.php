<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateRankingController;
use App\Http\Controllers\UniteRankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\SoftSkillsController;
use App\Http\Controllers\MedallausuarioController;
use App\Http\Controllers\historialController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("signup", [Controller::class, "signup"]);
Route::post("login", [Controller::class, "login"]);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::post("index/{mote}", [Controller::class, "index"]);
    Route::put("update/{id}", [Controller::class, "update"]);
    Route::put("updatePassword/{id}", [Controller::class, "updatePassword"]);
    Route::put("updatePhoto/{id}", [Controller::class, "updatePhoto"]);
    Route::get("logout", [Controller::class, "logout"]);
    Route::get("userporfolio/{id}", [Controller::class, "userporfolio"]);

    Route::get("indexranking/{mote}", [CreateRankingController::class, "indexranking"]);
    Route::get("index/{id}", [CreateRankingController::class, "index"]);
    Route::post("Createranking", [CreateRankingController::class, "Createranking"]);
    Route::post("updateranking/{id_usuario},{id_ranking}", [CreateRankingController::class, "updateranking"]);
    Route::put("updaterankingcode/{id}", [CreateRankingController::class, "updaterankingcode"]);
    Route::put("updatenombre", [CreateRankingController::class, "updatenombre"]);
    Route::post("deleteranking", [CreateRankingController::class, "Deleteranking"]);

    Route::get("indexnombreranking/{id}", [UniteRankingController::class, "indexnombreranking"]);
    Route::get("indexall/{id}", [UniteRankingController::class, "indexall"]);
    Route::get("indexespecifico/{id_usuario},{id_ranking}", [UniteRankingController::class, "indexespecifico"]);
    Route::get("motealumnos/{id_usuario},{id_ranking}", [UniteRankingController::class, "motealumnos"]);
    Route::post("unitedranking/{mote},{codigo}", [UniteRankingController::class, "unitedranking"]);
    Route::put("updatepuntosmedallas", [UniteRankingController::class, "updatepuntosmedallas"]);
    Route::post("deleteuser/", [UniteRankingController::class, "deleteuser"]);


    Route::post("createp", [PracticaController::class, "createp"]);
    Route::get("indexpractica/{id}", [PracticaController::class, "indexpractica"]);
    Route::get("indexindividual/{id},{id_ranking}", [PracticaController::class, "indexindividual"]);
    Route::get("practicanombre/{id},{id_ranking}", [PracticaController::class, "practicanombre"]);
    Route::post("deletep/{id}", [PracticaController::class, "deletep"]);

    Route::get("indexentrega/{id}", [EntregaController::class, "indexentrega"]);
    Route::get("indexentregaAlumno/{id},{id_usuario}", [EntregaController::class, "indexentregaAlumno"]);
    Route::post("entrega", [EntregaController::class, "entrega"]);
    Route::post("actualizarentrega/{id}", [EntregaController::class, "actualizarentregaarent"]);
    Route::put("actualizarnota/{id}", [EntregaController::class, "actualizarnota"]);
    Route::delete("deleteentrega/{id}", [EntregaController::class, "deleteentrega"]);

    Route::get("nombresoftskills", [SoftSkillsController::class, "nombresoftskills"]);
    Route::get("fotos/{nivel},{rango}", [SoftSkillsController::class, "fotos"]);
    Route::post("indexsoftskill", [SoftSkillsController::class, "indexsoftskill"]);
    Route::post("createsoftskill", [SoftSkillsController::class, "createsoftskill"]);
    Route::put("updatesoftskill/{id}", [SoftSkillsController::class, "updatesoftskill"]);
    Route::delete("deletesoftskill/{id}", [SoftSkillsController::class, "deletesoftskill"]);

    Route::get("selectResponsabilidad/{puntos}", [MedallausuarioController::class, "selectResponsabilidad"]);
    Route::get("selectCooperacion/{puntos}", [MedallausuarioController::class, "selectCooperacion"]);
    Route::get("selectAutonomia_e_iniciativa/{puntos}", [MedallausuarioController::class, "selectAutonomia_e_iniciativa"]);
    Route::get("selectGestion_emocional/{puntos}", [MedallausuarioController::class, "selectGestion_emocional"]);
    Route::get("selectHabilidades_de_pensamiento/{puntos}", [MedallausuarioController::class, "selectHabilidades_de_pensamiento"]);

    Route::get("indexhistorial/{id_ranking}", [historialController::class, "indexhistorial"]);
    Route::get("indexalumno_evaluador/{alumno_evaluador}", [historialController::class, "indexalumno_evaluador"]);
    Route::get("indexalumno_evaluado/{alumno_evaluado}", [historialController::class, "indexalumno_evaluado"]);
    Route::post("createhistorial", [historialController::class, "createhistorial"]);
    Route::get("selectpuntos/{id}", [historialController::class, "selectpuntos"]);
    Route::put("hacerresta", [historialController::class, "hacerresta"]);
    Route::delete("deleteevaluacion/{id}", [historialController::class, "deleteevaluacion"]);
});
