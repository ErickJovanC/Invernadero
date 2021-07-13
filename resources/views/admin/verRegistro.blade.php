@extends('layouts.app')
@section('content')
    <div class="row">
        <h1 class="col-12 text-center titulos">Registro de {{ $usuario->nombre }}</h1>
        <table class="table table-light table-responsive align-content-center mb-5 col-12 col-md-6">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Datos Personales</th>
                </tr>
                <tr>
                    <th>Fotografía</th>
                    <td>
                        <a href="{{ asset('storage').'/'. $usuario->foto }}" target="_blank">
                            <img src="{{ asset('storage').'/'. $usuario->foto }}" alt="Foto" width="85" title="Clic para ampliar">
                        </a>    
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Usuario</th>
                    <td>{{ $usuario->nombre .' '. $usuario->apellidoP .' '. $usuario->apellidoM }}</td>
                </tr>
                <tr>
                    <th>Telefono</th>
                    <td>{{ $usuario->telefono }}</td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td>{{$usuario->email }}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{ $usuario->direccion }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-light table-responsive align-content-center mb-5 col-12 col-md-6">
            <thead>
                <tr>
                    <th colspan="2" class="text-center">Datos de la Huerta</th>
                </tr>
                <tr>
                    <th>Huerta</th>
                    <td>
                        {{ $huerta->nombreHuerta }}
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Código Senasica</th>
                    <td>{{ $huerta->codigoRegistro }}</td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>{{ $huerta->estado->estado }}</td>
                </tr>
                <tr>
                    <th>Municipio</th>
                    <td>{{ $huerta->municipio->municipio }}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{ $huerta->calle .''. $huerta->colonia .''. $huerta->comunidad }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row justify-content-center">
        <div class="col-2 text-center">
            <a href="{{ route('admin.index') }}" class="btn btn-success  px-5" }}">Volver</a>
        </div>
        <div class="col-2 text-center">
            <a href="#" class="btn btn-primary  px-5" data-toggle="modal" data-target="#activar{{ $usuario->id }}">Activar</a>
        </div>
        <div class="col-2 text-center">
            <a href="#" class="btn btn-danger  px-5" data-toggle="modal" data-target="#rechazar{{ $usuario->id }}">Rechazar</a>
        </div>

        <!-- Modal Activar-->
        <div class="modal fade" id="activar{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h1" id="exampleModalLabel">Activar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                ¿Desea activar al usuario <b>{{ $usuario->nombre .' '. $usuario->apellidoP .' '. $usuario->apellidoM }}</b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{ route('admin.activarUsuario', $usuario->id) }}" class="btn btn-primary">Activar</a>
                </div>
            </div>
            </div>
        </div>

        <!-- Modal Rechazar-->
        <div class="modal fade" id="rechazar{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h1" id="exampleModalLabel">Rechazar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                ¿Esta seguro que desea rechazar al usuario <b>{{ $usuario->nombre .' '. $usuario->apellidoP .' '. $usuario->apellidoM }}</b>?
                <br>Esto lo ocultará de la lista de usuarios.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="{{ route('admin.rechazarUsuario', $usuario->id) }}" class="btn btn-danger">Rechazar Usuario</a>
                </div>
            </div>
            </div>
        </div>

    </div>
@endsection