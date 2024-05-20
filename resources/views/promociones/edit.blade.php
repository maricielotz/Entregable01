@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Promocion') }}</h1>

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
                <form action="{{ route('promociones.update', $promociones) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nro_promocion">{{ __('Promocion') }}</label>
                        <select class="form-control" id="nro_promocion" name="nro_promocion" required>
                            <option value="1" {{ $promociones->promocion ? 'selected' : '' }}>Activo</option>
                            <option value="0" {{ !$promociones->promocion ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    <div class="form-group">
                        <label for="tipo_de_viaje">{{ __('Tipo de viaje') }}</label>
                        <input type="text" class="form-control" id="tipo_de_viaje" name="tipo_de_viaje" value="{{ old('tipo_de_viaje', $promociones->tipo_de_viaje) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="costo">{{ __('Costo') }}</label>
                        <input type="int" class="form-control" id="costo" name="costo" value="{{ old('costo', $promociones->costo) }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        <a href="{{ route('promociones.index') }}" class="btn btn-secondary ml-2">{{ __('Regresar') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
