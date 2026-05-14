<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        $contactos = Contactos::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
        ]);

        return response()->json([
        'message' => 'Contacto creado exitosamente',
        'contactos' => $contactos], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contactos = Contactos::with(['citas' => function ($query) {
            $query->orderBy('fecha', 'asc');
        }])->find($id);

        if(!$contactos) {
            response()->json([
                'message' => 'Contacto no encontrado'
            ], 401);
        }

        return response()->json([
            'contactos' => $contactos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contactos $contactos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
        ]);

        $contactos = Contactos::find($id);

        if(!$contactos) {
            response()->json([
                'message' => 'Contacto no encontrado'
            ], 401);
        }

        $contactos->update($request->only(['nombre', 'apellidos']));

        return response()->json([
            'message' => 'Contacto actualizado exitosamente',
            'contactos' => $contactos,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contactos = Contactos::find($id);

        if(!$contactos) {
            response()->json([
                'message' => 'Contacto no encontrado'
            ], 401);
        }

        $contactos->delete();

        return response()->json([
            'message' => 'Contacto eliminado exitosamente'
        ], 200);
    }
}
