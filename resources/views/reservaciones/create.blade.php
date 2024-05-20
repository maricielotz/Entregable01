@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Agregar Reservacion</h1>

    <!-- Formulario de agregar persona -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('reservaciones.store') }}">
                @csrf
                <div class="form-group">
                        <label for="nro_reservacion">{{ __('Reservacion') }}</label>
                        <select class="form-control" id="nro_reservacion" name="nro_reservacion" required>
                            <option value="1">{{ __('Activo') }}</option>
                            <option value="0">{{ __('Inactivo') }}</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="nro_promocion">{{ __('Promocion') }}</label>
                        <select class="form-control" id="nro_promocion" name="nro_promocion" required>
                            <option value="1">{{ __('Activo') }}</option>
                            <option value="0">{{ __('Inactivo') }}</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="cliente_dni">DNI</label>
                    <input type="text" class="form-control" id="cliente_dni" name="cliente_dni" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mr-2">Agregar Reservacion</button>
                    <a href="{{ route('reservaciones.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
