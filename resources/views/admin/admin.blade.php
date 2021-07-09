@extends('layouts.app')
@section('content')
    <div class="row">
        <h1 class="col-12 text-center">Administración</h1>
        <h2 class="col">Usuarios Registrados</h2>
        <table class="table table-light table-responsive align-content-center">
            <thead>
                <th>Fotografía</th>
                <th>Usuario</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Dirección</th>
                <th>Actividades</th>
                <th>Finanzas</th>
            </thead>
            <tbody>
                @foreach($usuarios as $user)
                <tr>
                    <td>
                        @if($user->foto != null)
                            <a href="{{ asset('storage').'/'. $user->foto }}" target="_blank">
                                <img src="{{ asset('storage').'/'. $user->foto }}" alt="Foto" width="85">
                            </a>
                        @else
                            (Sin foto)
                        @endif
                    </td>
                    <td>{{ $user->nombre .' '. $user->apellidoP .' '. $user->apellidoM }}</td>
                    <td>{{ $user->telefono }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->direccion}}</td>
                    <td><a href="{{ route('admin.verActividades', $user->id) }}" class="btn btn-primary">Ver actividades</a></td>
                    <td><a href="#" class="btn btn-warning">Estado Financiero</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection