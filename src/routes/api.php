<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController; 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * Rutas para el recurso Evento.
 */
Route::get('/eventos', 'App\Http\Controllers\EventoController@index');
Route::post('/eventos', 'App\Http\Controllers\EventoController@store');
Route::get('/eventos/{id}', 'App\Http\Controllers\EventoController@show');
Route::put('/eventos/{id}', 'App\Http\Controllers\EventoController@update'); 
Route::delete('/eventos/{id}', 'App\Http\Controllers\EventoController@destroy');
/**
 * Rutas para el recurso Ponente.
 */
Route::get('/ponentes', 'App\Http\Controllers\PonenteController@index');
Route::post('/ponentes', 'App\Http\Controllers\PonenteController@store');
Route::get('/ponentes/{id}', 'App\Http\Controllers\PonenteController@show');
Route::put('/ponentes/{id}', 'App\Http\Controllers\PonenteController@update');
Route::delete('/ponentes/{id}', 'App\Http\Controllers\PonenteController@destroy');

/**
 * Rutas para el recurso Asistente.
 */
Route::get('/asistentes', 'App\Http\Controllers\AsistenteController@index');
Route::post('/asistentes', 'App\Http\Controllers\AsistenteController@store');
Route::get('/asistentes/{id}', 'App\Http\Controllers\AsistenteController@show');
Route::put('/asistentes/{id}', 'App\Http\Controllers\AsistenteController@update');
Route::delete('/asistentes/{id}', 'App\Http\Controllers\AsistenteController@destroy');