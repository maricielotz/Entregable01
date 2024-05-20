<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Cliente;
 
class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }
 
    public function create()
    {
        return view('clientes.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:clientes',
            'nombres' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
        ]);
 
        Cliente::create($request->all());
 
        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }
 
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }
 
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }
 
    /**public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'dni' => 'required|string|max:8|unique:personas,dni,' . $persona->dni,
            'estado' => 'required|boolean',
            'ruc' => 'nullable|string|max:11|unique:personas,ruc,' . $persona->dni,
            'apellido_paterno' => 'required|string|max:50',
            'apellido_materno' => 'required|string|max:50',
            'nombres' => 'required|string|max:50',
            'edad' => 'required|integer',
            'sexo' => 'required|string|max:1',
            'foto' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:100|unique:personas,email,' . $persona->dni,
        ]);
 
        $persona->update($request->all());
 
        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }*/
 
    public function update(Request $request, Cliente $cliente)
    {
        // Validar la entrada
        $request->validate([
            'dni' => 'required|string|max:20',
            'nombres' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'ciudad' => 'required|string|max:100',
        ]);
 
 
        // Actualizar los datos de la persona
        $cliente->dni = $request->dni;
        $cliente->nombres = $request->nombres;
        $cliente->apellido_paterno = $request->apellido_paterno;
        $cliente->apellido_materno = $request->apellido_materno;
        $cliente->direccion = $request->direccion;
        $cliente->ciudad = $request->ciudad;
        $cliente->save();
 
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }
 
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
 
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}