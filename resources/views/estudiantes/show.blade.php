@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Detalle del Estudiante</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5>DNI: {{ $estudiante->persona->dni }}</h5>
            <h5>Nombre: {{ $estudiante->persona->nombres }} {{ $estudiante->persona->apellido_paterno }}</h5>
            <h5>Código: {{ $estudiante->codigo }}</h5>
            <h5>Fecha de Ingreso: {{ $estudiante->fecha_ingreso }}</h5>
        </div>
    </div>

    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
@endsection
