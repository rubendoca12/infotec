<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PonenteController extends Controller
{
    public function index()
    {
        $ponentes = Ponente::all();
        return response()->json([
            'ponentes' => $ponentes,
            'status' => 200,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400,
            ], 400);
        }

        $ponente = Ponente::create([
            'nombre' => $request->nombre,
            'biografia' => $request->biografia,
            'especialidad' => $request->especialidad,
        ]);

        if (!$ponente) {
            return response()->json([
                'message' => 'Error al crear ponente',
                'status' => 500,
            ], 500);
        }

        return response()->json([
            'ponente' => $ponente,
            'status' => 201,
        ], 201);
    }

    public function show($id)
    {
        $ponente = Ponente::find($id);

        if (!$ponente) {
            return response()->json([
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ], 404);
        }

        return response()->json([
            'ponente' => $ponente,
            'status' => 200,
        ]);
    }

    public function update(Request $request, $id)
    {
        $ponente = Ponente::find($id);

        if (!$ponente) {
            return response()->json([
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes',
                'status' => 400,
            ], 400);
        }

        $ponente->nombre = $request->nombre;
        $ponente->biografia = $request->biografia;
        $ponente->especialidad = $request->especialidad;
        $ponente->save();

        return response()->json([
            'ponente' => $ponente,
            'status' => 200,
        ]);
    }

    public function destroy($id)
    {
        $ponente = Ponente::find($id);

        if (!$ponente) {
            return response()->json([
                'message' => 'Ponente no encontrado',
                'status' => 404,
            ], 404);
        }

        $ponente->delete();

        return response()->json([
            'message' => 'Ponente eliminado',
            'status' => 200,
        ]);
    }
}