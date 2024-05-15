@extends('layouts.admin')

@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">{{ $estudiante ? 'Editar Estudiante' : 'Crear Estudiante' }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ $estudiante ? route('estudiantes.update', $estudiante->id) : route('estudiantes.store') }}">
        @csrf
        @if($estudiante)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="persona_dni">DNI de Persona</label>
            <select name="persona_dni" id="persona_dni" class="form-control">
                @foreach ($personas as $persona)
                    <option value="{{ $persona->dni }}" {{ $estudiante && $estudiante->persona_dni == $persona->dni ? 'selected' : '' }}>
                        {{ $persona->dni }} - {{ $persona->nombres }} {{ $persona->apellido_paterno }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="codigo">Código</label>
            <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $estudiante ? $estudiante->codigo : '' }}">
        </div>

        <div class="form-group">
            <label for="fecha_ingreso">Fecha de Ingreso</label>
            <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" value="{{ $estudiante ? $estudiante->fecha_ingreso : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ $estudiante ? 'Actualizar' : 'Crear' }}</button>
    </form>
@endsection
