<?php

use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateRankingController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\UniteRankingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    Route::post("index/{mote}",[Controller::class,"index"]);
    Route::put("update/{id}", [Controller::class, "update"]);
    Route::put("updatePassword/{id}", [Controller::class, "updatePassword"]);
    Route::put("updatePhoto/{id}", [Controller::class, "updatePhoto"]);
    Route::get("logout", [Controller::class, "logout"]);
    Route::get("userporfolio/{id}", [Controller::class, "userporfolio"]);


    Route::post("indexranking/{mote}",[CreateRankingController::class,"indexranking"]);
    Route::post("Createranking",[CreateRankingController::class, "Createranking"]);
    Route::put("updateranking/{id}",[CreateRankingController::class, "updateranking"]);
    Route::delete("deleteranking",[CreateRankingController::class, "Deleteranking"]);


    Route::post("indexa/{mote}",[UniteRankingController::class,"indexa"]);
    Route::post("indexall/{codigo}",[UniteRankingController::class,"indexall"]);
    Route::post("unitedranking/{id_usuario},{codigo}",[UniteRankingController::class,"unitedranking"]);
});
