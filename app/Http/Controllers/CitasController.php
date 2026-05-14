<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citas = Citas::all();
        return view('citas.index', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required|time',
            'descripcion' => 'required|string|max:255',
        ]);

        $citas = Citas::create([
            'titulo' => $request->titulo,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json([
        'message' => 'Cita creada exitosamente',
        'citas' => $citas], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Citas $citas)
    {
        $citas = Citas::with(['contactos' => function ($query) {
            $query->orderBy('nombre', 'asc');
        }])->find($id);

        if(!$citas) {
            response()->json([
                'message' => 'Cita no encontrada'
            ], 401);
        }

        return response()->json([
            'message' => 'Cita encontrada exitosamente',
            'citas' => $citas
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citas $citas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citas $citas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citas $citas)
    {
        //
    }
}
