<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsolasController;
use App\Http\Controllers\JuegosController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("marcas/get", [ConsolasController::class, "getMarcas"]);

Route::get("consolas/get", [ConsolasController::class, "getConsolas"]);
Route::get("consolas/filtrar", [ConsolasController::class, "filtrarConsolas"]);

Route::post("consolas/post", [ConsolasController::class, "crearConsola"]);
Route::post("consolas/delete", [ConsolasController::class,"eliminarConsola"]);


Route::get("juegos/get", [JuegosController::class, "getJuegos"]);
Route::get("juegos/getByConsola", [JuegosController::class, "getJuegosByController"]);
Route::post("juegos/post", [JuegosController::class, "save"]);
Route::post("juegos/delete", [JuegosController::class, "remove"]);