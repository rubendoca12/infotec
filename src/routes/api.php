<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\AsistenteController; 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Rutas para el recurso Evento.
 */
Route::get('/eventos', [EventoController::class, 'index']);
Route::post('/eventos', [EventoController::class, 'store']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);
Route::put('/eventos/{id}', [EventoController::class, 'update']); 
Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);
/**
 * Rutas para el recurso Ponente.
 */
Route::get('/ponentes', [PonenteController::class, 'index']);
Route::post('/ponentes', [PonenteController::class, 'store']);
Route::get('/ponentes/{id}', [PonenteController::class, 'show']);
Route::put('/ponentes/{id}', [PonenteController::class, 'update']);
Route::delete('/ponentes/{id}', [PonenteController::class, 'destroy']);

/**
 * Rutas para el recurso Asistente.
 */
Route::get('/asistentes', [AsistenteController::class, 'index']);
Route::post('/asistentes', [AsistenteController::class, 'store']);
Route::get('/asistentes/{id}', [AsistenteController::class, 'show']);
Route::put('/asistentes/{id}', [AsistenteController::class, 'update']);
Route::delete('/asistentes/{id}', [AsistenteController::class, 'destroy'])