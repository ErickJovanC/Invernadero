@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Secciones</h1>
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
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection