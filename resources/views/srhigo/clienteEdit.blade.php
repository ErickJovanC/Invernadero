@extends('layouts.app')
@section('content')
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Editar Destinatario</h1>
    <form action="{{ route('cliente.update', $cliente) }}" method="post" class="col-12">
    @csrf
    @method('patch')
        <div class="row align-items-end">
            {{-- Nombre --}}
            {{-- <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="nombre">Nombre</label>
                <input type="text" 
                    name="nombre" 
                    id="nombre"
                    value="{{ old('nombre') ? old('nombre') : $cliente->nombre}}"
                    class="form-control @error('nombre') is-invalid @enderror">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> --}}
            {{-- Fin Nombre --}}

            {{-- Apellido --}}
            {{-- <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="apellido">Apellido</label>
                <input type="text" 
                    name="apellido" 
                    id="apellido"
                    value="{{ old('apellido') ? old('apellido') : $cliente->apellido }}"
                    class="form-control @error('apellido') is-invalid @enderror">
                @error('apellido')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> --}}
            {{-- Fin Apellido --}}

            {{-- Empresa --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="empresa">Empresa o Particular</label>
                <input type="text" 
                    name="empresa" 
                    id="empresa"
                    value="{{ old('empresa') ? old('empresa') : $cliente->empresa }}"
                    class="form-control @error('empresa') is-invalid @enderror">
                @error('empresa')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Empresa --}}

            {{-- Destino --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="empresa">Destino</label>
                <select name="destino" id="destino" class="form-control @error('destino') is-invalid @enderror">
                    <option value="Nacional" {{ $cliente->destino == 'Nacional' ? 'selected' : '' }}>Nacional</option>
                    <option value="Internacional" {{ $cliente->destino == 'Internacional' ? 'selected' : '' }}>Internacional</option>
                </select>
            </div>
            {{-- Fin Destino --}}
        </div>

        {{-- Botones --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <a href="{{ route('cliente.create') }}"
                    class="btn btn-secondary mr-3">
                    Cancelar edición
                </a>
                <input type="submit" value="Guardar Cambios" class="btn btn-warning px-5">
            </div>
        </div>
    </form>
</div>
@endsection