@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Historial de Actividades</h1>
    <h2 class="h1">Preparación de suelo</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">Huerta</th>
                <th scope="col">Sección</th>
                {{-- <th scope="col">Actividad</th> --}}
                <th scope="col">Responsable</th>
                <th scope="col">Ver Detalle</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preparacionSuelo as $actividad)
            <tr>
                <td>{{ $actividad['updated_at'] }}</td>
                <td>{{ $actividad->huerta->nombreHuerta }}</td>
                <td>{{ $actividad->seccion->nombreSeccion }}</td>
                {{-- <td>Preparación de suelo</td> --}}
                <td>{{ 
                    $actividad->empleado->nombreEmpleado .' '.
                    $actividad->empleado->apellidoEmpleado .' ('.
                    $actividad->empleado->sobrenombreEmpleado .')'}}
                </td>
                <td><a href="#">Ver detalle</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection