@extends('layouts.basico')
@section('content')
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Registro de Empleados</h1>
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
            <div>
                <a href="{{ route('enrutador') }}" class="btn btn-success px-5 mx-5">Finalizar Registro</a>
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
                    {{-- <th scope="col">Acciones</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <th scope="row">{{ $empleado->id }}</th>
                    <td>{{ $empleado->nombreEmpleado }}</td>
                    <td>{{ $empleado->apellidoEmpleado }}</td>
                    <td>{{ $empleado->sobrenombreEmpleado }}</td>
                    {{-- <td><a href="{{ route('empleado.edit', $empleado) }}" class="btn btn-warning">Editar</a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- fin Tabla de empleados --}}
@endsection