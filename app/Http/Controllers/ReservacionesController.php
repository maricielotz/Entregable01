<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Reservaciones;

class ReservacionesController extends Controller
{
    public function index()
    {
        $reservaciones = Reservaciones::with('cliente')->get();
        return view('reservaciones.index', compact('reservaciones'));
    }

    public function create()
    {
        $reservaciones = Reservaciones::all();
        return view('reservaciones.create', compact('reservaciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nro_reservacion' => 'required|boolean',
            'nro_promocion' => 'required|boolean',
            'cliente_dni' => 'required|string|max:20|exists:clientes,dni',
        ]);

    }

    public function show(Reservaciones $reservaciones)
    {
        return view('reservaciones.show', compact('reservaciones'));
    }

    //public function edit(Docente $docente)
    //{
    //    $personas = Persona::all();
    //    return view('docentes.edit', compact('docente', 'personas'));
    //}

    public function edit($id)
    {
        $reservaciones = Reservaciones::findOrFail($id);
        $clientes = Cliente::all();
        return view('reservaciones.edit', compact('reservaciones', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $reservaciones = Reservaciones::findOrFail($id);
        $request->validate([
            'nro_reservacion' => 'required|boolean',
            'nro_promocion' => 'required|boolean',
            'cliente_dni' => 'required|string|max:20|exists:clientes,dni',
        ]);

        $reservaciones->update($request->all());

        return redirect()->route('reservaciones.index')->with('success', 'Reservaciones actializadas correctamente.');
    }

    public function destroy(Reservaciones $reservaciones)
    {
        $reservaciones->delete();

        return redirect()->route('reservaciones.index')->with('success', 'Reservacion eliminada exitosamente.');
    }
}