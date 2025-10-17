<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Foco;
use Illuminate\Http\JsonResponse;

class FocoController extends Controller
{
    /**
     * Retorna el estado de un foco específico buscando por su código.
     */
    public function status(string $codigo): JsonResponse
    {
        // Buscamos el foco en la base de datos donde la columna 'codigo'
        // coincida con el $codigo que viene de la URL.
        $foco = Foco::where('codigo', $codigo)->first();

        // Si no se encuentra ningún foco con ese código, devolvemos un error 404.
        if (!$foco) {
            return response()->json(['message' => 'Foco no encontrado.'], 404);
        }

        // Si se encuentra, devolvemos sus datos.
        return response()->json([
            'id' => $foco->id,
            'intensidad' => $foco->intensidad,
        ]);
    }
}