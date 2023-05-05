<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateRankingController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\UniteRankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticaController;
use App\Http\Controllers\EntregaController;

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
    Route::post("unitedranking/{mote},{codigo}", [UniteRankingController::class, "unitedranking"]);
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


    Route::post("indexsoftskill",[SoftSkillsController::class,"indexsoftskill"]);
    Route::post("createsoftskill",[SoftSkillsController::class,"createsoftskill"]);
    Route::put("updatesoftskill/{id}",[SoftSkillsController::class,"updatesoftskill"]);
    Route::delete("deletesoftskill/{id}",[SoftSkillsController::class,"deletesoftskill"]);
    
    
    Route::post("indexallmedaalauser",[MedallausuarioController::class,"indexallmedaalauser"]);
    Route::post("createmedallauser",[MedallausuarioController::class,"createmedallauser"]);
    Route::put("updatemedallausuario",[MedallausuarioController::class,"updatemedallausuario"]);
    Route::delete("deletemedallausuario",[MedallausuarioController::class,"deletemedallausuario"]);
    
    
    Route::put("updateResponsabilidadp/{mote},{codigo},{puntosenv}",[PuntuarcompañerosController::class,"updateResponsabilidadp"]);
    Route::put("updateCooperaciónp/{mote},{codigo},{puntosenv}",[PuntuarcompañerosController::class,"updateCooperaciónp"]);
    Route::put("updateAutonomía_e_iniciativap/{mote},{codigo},{puntosenv}",[PuntuarcompañerosController::class,"updateAutonomía_e_iniciativap"]);
    Route::put("updateGestión_emocionalp/{mote},{codigo},{puntosenv}",[PuntuarcompañerosController::class,"updateGestión_emocionalp"]);
    Route::put("updateabilidades_de_pensamientop/{mote},{codigo},{puntosenv}",[PuntuarcompañerosController::class,"updateabilidades_de_pensamientop"]);
});
