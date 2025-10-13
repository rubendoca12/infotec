<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistente;

class AsistenteController extends Controller
{
    public function index()
    {
        $asistentes = Asistente::all();
        return response()->json($asistentes);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:asistentes,correo',
            'telefono' => 'nullable|string|max:20',
            'evento_id' => 'required|exists:eventos,id',
        ]);

        $asistente = Asistente::create($validated);

        return response()->json([
            'message' => 'Asistente registrado correctamente',
            'asistente' => $asistente
        ], 201);
    }

    public function show($id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json(['message' => 'Asistente no encontrado'], 404);
        }

        return response()->json($asistente);
    }

    public function update(Request $request, $id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json(['message' => 'Asistente no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|unique:asistentes,correo,' . $asistente->id,
            'telefono' => 'nullable|string|max:20',
            'evento_id' => 'sometimes|required|exists:eventos,id',
        ]);

        $asistente->update($validated);

        return response()->json([
            'message' => 'Asistente actualizado correctamente',
            'asistente' => $asistente
        ]);
    }

    public function destroy($id)
    {
        $asistente = Asistente::find($id);

        if (!$asistente) {
            return response()->json(['message' => 'Asistente no encontrado'], 404);
        }

        $asistente->delete();

        return response()->json(['message' => 'Asistente eliminado correctamente']);
    }
}
