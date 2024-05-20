<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Promociones;

class PromocionesController extends Controller
{
    public function index()
    {
        $promociones = Promociones::with('cliente')->get();
        return view('promociones.index', compact('promociones'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('promociones.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nro_promocion' => 'required|boolean',
            'tipo_de_viaje' => 'required|string|max:200',
            'costo' => 'required|integer|max:10,2',
        ]);

        Promociones::create($request->all());

        return redirect()->route('promociones.index')->with('success', 'Promoción realizada exitosamente.');
    }

    public function show(Promociones $promociones)
    {
        return view('promociones.show', compact('promocion'));
    }

    public function edit($id)
    {
        $promociones = Promociones::findOrFail($id);
        $clientes = Cliente::all();
        return view('promociones.edit', compact('promocion', 'clientes'));
    }

    public function update(Request $request, $id)
    {
        $promociones = Promociones::findOrFail($id);
        $request->validate([
            'nro_promocion' => 'required|boolean',
            'tipo_de_viaje' => 'required|string|max:200',
            'costo' => 'required|integer|max:10,2',
        ]);

        $promociones->update($request->all());

        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada correctamente.');
    }

    public function destroy(Promociones $promociones)
    {
        $promociones->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada exitosamente.');
    }
}
