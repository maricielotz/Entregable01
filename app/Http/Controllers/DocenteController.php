<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::with('persona')->get();
        return view('docentes.index', compact('docentes'));
    }

    public function create()
    {
        $personas = Persona::all();
        return view('docentes.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'persona_dni' => 'required|exists:personas,dni',
            'codigo' => 'required|string|max:10|unique:docentes',
            'fecha_contratacion' => 'required|date',
        ]);

        Docente::create($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente creado exitosamente.');
    }

    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docente $docente)
    {
        $personas = Persona::all();
        return view('docentes.edit', compact('docente', 'personas'));
    }

    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'persona_dni' => 'required|exists:personas,dni',
            'codigo' => 'required|string|max:10|unique:docentes,codigo,' . $docente->id,
            'fecha_contratacion' => 'required|date',
        ]);

        $docente->update($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado exitosamente.');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();

        return redirect()->route('docentes.index')->with('success', 'Docente eliminado exitosamente.');
    }
}
