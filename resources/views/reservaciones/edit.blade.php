@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Reservaciones') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('reservaciones.update', $reservaciones) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nro_reservacion">{{ __('Reservacion') }}</label>
                        <select class="form-control" id="nro_reservacion" name="nro_reservacion" required>
                            <option value="1" {{ $reservaciones->nro_reservacion? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ !$reservaciones->nro_reservacion ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nro_promocion">{{ __('Promocion') }}</label>
                        <select class="form-control" id="nro_promocion" name="nro_promocion" required>
                            <option value="1" {{ $promociones->nro_promocion ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ !$promociones->nro_promocion ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cliente_dni">{{ __('DNI del Cliente') }}</label>
                        <select class="form-control" id="cliente_dni" name="cliente_dni" required>
                            @foreach($reservaciones as $reservacion)
                                <option value="{{ $cliente->dni }}" {{ $reservaciones->cliente_dni == $cliente->dni ? 'selected' : '' }}>
                                    {{ $reservaciones->reservacion }} - {{ $reservaciones->promocion }} {{ $reservaciones->cliente_dni }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        <a href="{{ route('reservaciones.index') }}" class="btn btn-secondary ml-2">{{ __('Regresar') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
