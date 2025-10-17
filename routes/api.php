<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar rutas de API para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y todas ellas
| serán asignadas al grupo de middleware "api".
|
*/

// Ruta de prueba ultra-simple
Route::get('/saludo', function () {
    return response()->json(['message' => '¡Hola desde la API de Laravel!']);
});