<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
use App\Models\Nota;
use Illuminate\Http\JsonResponse;

class NotaController extends Controller
{
    public function index(): JsonResponse
    {
        $notas = Nota::all();
        return response()->json($notas, 200);
    }

    public function store(NotaRequest $request): JsonResponse
    {
        Nota::create($request->all());
        return response()->json(['success' => true], 201);
    }

    public function show(string $id): JsonResponse
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        return response()->json($nota, 200);
    }

    public function update(NotaRequest $request, string $id): JsonResponse
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        $nota->titulo = $request->titulo;
        $nota->contenido = $request->contenido;
        $nota->save();

        return response()->json(['success' => true], 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota no encontrada'], 404);
        }

        $nota->delete();

        return response()->json(['success' => true], 200);
    }
}
