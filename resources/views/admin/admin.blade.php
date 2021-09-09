@extends('layouts.app')
@section('content')
    <div class="row">
        <h1 class="col-12 text-center titulos">Administración</h1>
        @php
            $table = true;
        @endphp
                    {{-- Usuarios Pendientes de Activación --}}
                    @foreach($usuarios as $user)
                        @if($user->nivelRegistro == 4)
                            @if($table)
                                <h2 class="col-12 h1">Usuarios por Activar</h2>
                                <table class="table table-light table-responsive-md align-content-center mb-5">
                                    <thead>
                                        <th>Fotografía</th>
                                        <th>Usuario</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Dirección</th>
                                        <th>Ver Registro Completo</th>
                                        <th>Activar / Rechazar</th>
                                    </thead>
                                    <tbody>
                                @php
                                    $table = false;
                                @endphp
                            @endif
                            <tr>
                                <td>
                                    @if($user->foto != null)
                                        <a href="{{ asset('storage').'/'. $user->foto }}" target="_blank">
                                            <img src="{{ asset('storage').'/'. $user->foto }}" alt="Foto" width="85" title="Clic para ampliar">
                                        </a>
                                    @else
                                        (Sin foto)
                                    @endif
                                </td>
                                <td>{{ $user->nombre .' '. $user->apellidoP .' '. $user->apellidoM }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->direccion}}</td>
                                <td><a href="{{ route('admin.verRegistro', $user->id) }}" class="btn btn-success">Ver Registro Completo</a></td>
                                <td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#activar{{ $user->id }}">Activar</a>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#rechazar{{ $user->id }}">Rechazar</a>
                                </td>
                            </tr>
                            
                            <!-- Modal Activar-->
                            <div class="modal fade" id="activar{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h1" id="exampleModalLabel">Activar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    ¿Desea activar al usuario <b>{{ $user->nombre .' '. $user->apellidoP .' '. $user->apellidoM }}</b>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a href="{{ route('admin.activarUsuario', $user->id) }}" class="btn btn-primary">Activar</a>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <!-- Modal Rechazar-->
                            <div class="modal fade" id="rechazar{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title h1" id="exampleModalLabel">Rechazar Usuario</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    ¿Esta seguro que desea rechazar al usuario <b>{{ $user->nombre .' '. $user->apellidoP .' '. $user->apellidoM }}</b>?
                                    <br>Esto lo ocultará de la lista de usuarios.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a href="{{ route('admin.rechazarUsuario', $user->id) }}" class="btn btn-danger">Rechazar Usuario</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                        @endif    
                    @endforeach
                </tbody>
            </table>

        <h2 class="col-12 h1">Usuarios Registrados</h2>
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
                @if($user->nivelRegistro == 5)
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
                        <td><a href="{{ route('finanzasAdmin.index', $user->id) }}" class="btn btn-warning">Estado Financiero</a></td>
                    </tr>
                @endif    
                @endforeach
            </tbody>
        </table>
    </div>
@endsection