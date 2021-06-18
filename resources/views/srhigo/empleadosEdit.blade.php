@extends('layouts.app')
@section('content')
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Empleados</h1>
    @isset($mensaje)
        <div class="alert alert-info col-12 text-center">{{ $mensaje }}</div>
    @endisset
    <form action="{{ route('empleado.update', $empleado) }}" method="post" class="col-12">
    @csrf
    @method('patch')
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="nombreEmpleado">Nombre</label>
                <input type="text" 
                    name="nombreEmpleado" id="nombreEmpleado" 
                    class="form-control @error('nombreEmpleado') is-invalid @enderror" 
                    value="{{ old('nombreEmpleado') ? old('nombreEmpleado') : $empleado->nombreEmpleado }}"
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
                    value="{{ old('apellidoEmpleado') ? old('apellidoEmpleado') : $empleado->apellidoEmpleado }}"
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
                    value="{{ old('sobrenombreEmpleado') ? old('sobrenombreEmpleado') : $empleado->sobrenombreEmpleado }}"
                />
                @error('sobrenombreEmpleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror 
            </div>
        </div>

        {{-- Botones --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <a href="{{ route('empleado.create') }}"
                    class="btn btn-secondary mr-3">
                    Cancelar Edición
                </a>
                <input type="submit" value="Editar Empleado" class="btn btn-warning px-5">
            </div>
        </div>
    </form>
</div>

@endsection