@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Agregar Promocion</h1>

    <!-- Formulario de agregar persona -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('promociones.store') }}">
                @csrf
                <div class="form-group">
                        <label for="nro_promocion">{{ __('Promocion') }}</label>
                        <select class="form-control" id="nro_promocion" name="nro_promocion" required>
                            <option value="1">{{ __('Activo') }}</option>
                            <option value="0">{{ __('Inactivo') }}</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="tipo_de_viaje">Tipo de Viaje</label>
                    <input type="text" class="form-control" id="tipo_de_viaje" name="tipo_de_viaje" required>
                </div>
                <div class="form-group">
                    <label for="costo">costo</label>
                    <input type="int" class="form-control" id="costo" name="costo" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-2">Agregar Promocion</button>
                    <a href="{{ route('promociones.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
