@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Ver Reservacion') }}</h1>

        <div class="card shadow mb-4">
                <div class="form-group">
                    <label for="nro_reservacion">{{ __('Reservacion') }}</label>
                    <p>{{ $reservaciones->nro_reservacion ? 'Activo' : 'Inactivo' }}</p>
                </div>
                <div class="form-group">
                    <label for="nro_promocion">{{ __('Promocion') }}</label>
                    <p>{{ $reservaciones->nro_promocion ? 'Activo' : 'Inactivo' }}</p>
                </div>
                <div class="form-group">
                    <label for="cliente_dni">{{ __('DNI del Cliente') }}</label>
                    <p>{{ $reservaciones->cliente_dni }}</p>
                </div>
                <a href="{{ route('reservaciones.index') }}" class="btn btn-secondary">{{ __('Volver') }}</a>
            </div>
        </div>
    </div>
@endsection
