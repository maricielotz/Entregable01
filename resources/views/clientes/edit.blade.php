@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Editar Cliente') }}</h1>

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
                <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="dni">{{ __('DNI') }}</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $cliente->dni) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">{{ __('Nombres') }}</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $cliente->nombres) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_paterno">{{ __('Apellido Paterno') }}</label>
                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno', $cliente->apellido_paterno) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="apellido_materno">{{ __('Apellido Materno') }}</label>
                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno', $cliente->apellido_materno) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">{{ __('Direccion') }}</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">{{ __('Ciudad') }}</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ old('ciudad', $cliente->cliente) }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary ml-2">{{ __('Regresar') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
