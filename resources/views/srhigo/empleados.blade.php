@extends('layouts.app')
@section('content')
<div class="row">
    <a href="{{ route('main') }}" class="btn btn-success ">Menú Principal</a>
</div>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Empleados</h1>
    @isset($mensaje)
        <div class="alert alert-info col-12 text-center">{{ $mensaje }}</div>
    @endisset
    <form action="{{ route('empleado.store') }}" method="post" class="col-12">
    @csrf
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="nombreEmpleado">Nombre</label>
                <input type="text" 
                    name="nombreEmpleado" id="nombreEmpleado" 
                    class="form-control @error('nombreEmpleado') is-invalid @enderror" 
                    value="{{ old('nombreEmpleado') }}"
                />
                @error('nombreEmpleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="apellidoEmpleado">Apellido</label>
                <input type="text" 
                    name="apellidoEmpleado" id="apellidoEmpleado" 
                    class="form-control @error('apellidoEmpleado') is-invalid @enderror" 
                    value="{{ old('apellidoEmpleado') }}"
                />
                @error('apellidoEmpleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="sobrenombreEmpleado">Sobrenombre (Apodo)</label>
                <input type="text" 
                    name="sobrenombreEmpleado" id="sobrenombreEmpleado" 
                    class="form-control @error('sobrenombreEmpleado') is-invalid @enderror" 
                    value="{{ old('sobrenombreEmpleado') }}"
                />
                @error('sobrenombreEmpleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror 
            </div>
        </div>

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Empleado" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>

{{-- Tabla de empleados --}}
<div class="row justify-content-center">
    <div class="col-12 justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"># Reg.</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Apodo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <th scope="row">{{ $empleado->id }}</th>
                    <td>{{ $empleado->nombreEmpleado }}</td>
                    <td>{{ $empleado->apellidoEmpleado }}</td>
                    <td>{{ $empleado->sobrenombreEmpleado }}</td>
                    <td><button class="btn btn-danger" data-toggle="modal" data-target="#empleado{{ $empleado->id }}">Eliminar</button>
                        {{-- Modal --}}
                        <div class="modal fade" id="empleado{{ $empleado->id }}" tabindex="-1" role="dialog" aria-labelledby="Titulo" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="Titulo">¿Borrar Registro?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                    {{ $empleado->nombreEmpleado ." ". $empleado->apellidoEmpleado ." (". $empleado->sobrenombreEmpleado .")" }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-danger">Eliminar Registro</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        {{-- Fin modal --}}
                    </td>
                </tr>

                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- fin Tabla de empleados --}}

<div class="row">
    <a href="{{ route('main') }}" class="btn btn-success ">Menú Principal</a>
</div>
@endsection