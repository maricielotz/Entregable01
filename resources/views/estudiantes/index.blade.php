@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Listado de Estudiantes</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mb-3">Crear Estudiante</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Fecha de Ingreso</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>{{ $estudiante->persona->dni }}</td>
                            <td>{{ $estudiante->persona->nombres }} {{ $estudiante->persona->apellido_paterno }}</td>
                            <td>{{ $estudiante->codigo }}</td>
                            <td>{{ $estudiante->fecha_ingreso }}</td>
                            <td>
                                <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
