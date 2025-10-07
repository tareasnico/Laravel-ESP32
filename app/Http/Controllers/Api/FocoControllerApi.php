<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Foco;
use Illuminate\Http\Request; // Añadido por si acaso, aunque no se use directamente en 'status'
use Illuminate\Http\JsonResponse;

class FocoController extends Controller
{
    /**
     * Retorna el estado de un foco específico en formato JSON.
     * Laravel automáticamente inyectará el modelo Foco si encuentra el ID.
     *
     * @param  \App\Models\Foco  $foco  El modelo Foco correspondiente al ID en la URL.
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Foco $foco): JsonResponse
    {
        // Devuelve los datos del foco que interesan al ESP32
        return response()->json([
            'id' => $foco->id,
            'intensidad' => $foco->intensidad, // Valor de 0 a 100
        ]);
    }
}