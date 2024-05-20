@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Reservacion') }}</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('reservaciones.create') }}" class="btn btn-primary">{{ __('Agregar Reservacion') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Reservacion</th>
                            <th>Promocion</th>
                            <th>DNI del Cliente</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservaciones as $reservacion)
                            <tr>
                                <td>{{ $reservaciones->reservacion }}</td>
                                <td>{{ $reservaciones->promocion }}</td>
                                <td>{{ $reservaciones->cliente_dni  }}</td>
                                <td>
                                    <a href="{{ route('reservaciones.show', $reservaciones) }}" class="btn btn-info btn-sm">{{ __('Ver') }}</a>
                                    <a href="{{ route('reservaciones.edit', $reservaciones) }}" class="btn btn-warning btn-sm">{{ __('Editar') }}</a>
                                    <form action="{{ route('reservaciones.destroy', $reservaciones) }}" method="POST" style="display:inline;">
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
