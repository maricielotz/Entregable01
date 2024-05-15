<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::with('persona')->get();
        return view('estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('estudiantes.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_dni' => 'required|exists:personas,dni',
            'codigo' => 'required|string|max:10|unique:estudiantes',
            'fecha_ingreso' => 'required|date',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado exitosamente.');
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    public function edit(Estudiante $estudiante)
    {
        $personas = Persona::all();
        return view('estudiantes.edit', compact('estudiante', 'personas'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'persona_dni' => 'required|exists:personas,dni',
            'codigo' => 'required|string|max:10|unique:estudiantes,codigo,' . $estudiante->id,
            'fecha_ingreso' => 'required|date',
        ]);

        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
