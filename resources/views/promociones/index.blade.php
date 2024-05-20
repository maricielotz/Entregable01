@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Promocion') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('promociones.create') }}" class="btn btn-primary">{{ __('Agregar Promocion') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Promocion</th>
                            <th>Tipo de viaje</th>
                            <th>Costo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($promociones as $promocion)
                            <tr>
                                <td>{{ $promociones->promocion }}</td>
                                <td>{{ $promociones->tipo_de_viaje }}</td>
                                <td>{{ $promociones->costo }}</td>
                                <td>
                                    <a href="{{ route('promociones.show', $promociones) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('promociones.edit', $promociones) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('promociones.destroy', $promociones) }}" method="POST" style="display:inline;">
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
