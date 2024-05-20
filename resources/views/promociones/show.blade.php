@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Detalle de la Promocion') }}</h1>

            <div class="form-group">
                    <label for="nro_promocion">{{ __('Promocion') }}</label>
                    <p>{{ $promociones->promocion ? 'Activo' : 'Inactivo' }}</p>
                </div>
                <div class="form-group">
                    <label for="tipo_de_viaje">{{ __('Tipo de viaje') }}</label>
                    <input type="text" class="form-control" id="tipo_de_viaje" value="{{ $promociones->tipo_de_viaje }}" readonly>
                </div>
                <div class="form-group">
                    <label for="costo">{{ __('Costo') }}</label>
                    <input type="int" class="form-control" id="costo" value="{{ $promociones->costo }}" readonly>
                </div>
                </div>
                <a href="{{ route('promociones.index') }}" class="btn btn-primary">{{ __('Regresar') }}</a>
            </div>
        </div>
    </div>
@endsection
