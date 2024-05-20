@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Clientes') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('clientes.create') }}" class="btn btn-primary">{{ __('Agregar Cliente') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Direccion</th>
                            <th>Ciudad</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->dni }}</td>
                                <td>{{ $cliente->nombres }}</td>
                                <td>{{ $cliente->apellido_paterno }}</td>
                                <td>{{ $cliente->apellido_materno }}</td>
                                <td>{{ $cliente->direccion }}</td>
                                <td>{{ $cliente->ciudad }}</td>
                                <td>
                                    <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
