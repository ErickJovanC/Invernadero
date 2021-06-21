@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Clientes (Destinatarios)</h1>

    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center">
            {!! Session::get('mensaje') !!}
        </div>
    @endif
    
    <form action="{{ route('cliente.store') }}" method="post" class="col-12">
    @csrf
        <div class="row align-items-end">
            {{-- Nombre --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="nombre">Nombre</label>
                <input type="text" 
                    name="nombre" 
                    id="nombre"
                    value="{{ old('nombre')}}"
                    class="form-control @error('nombre') is-invalid @enderror">
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Nombre --}}

            {{-- Apellido --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="apellido">Apellido</label>
                <input type="text" 
                    name="apellido" 
                    id="apellido"
                    value="{{ old('apellido')}}"
                    class="form-control @error('apellido') is-invalid @enderror">
                @error('apellido')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Apellido --}}

            {{-- Empresa --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="empresa">Empresa</label>
                <input type="text" 
                    name="empresa" 
                    id="empresa"
                    value="{{ old('empresa')}}"
                    class="form-control @error('empresa') is-invalid @enderror">
                @error('empresa')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Empresa --}}

            {{-- dirección --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="direccion">dirección</label>
                <input type="text" 
                    name="direccion" 
                    id="direccion"
                    value="{{ old('direccion')}}"
                    class="form-control @error('direccion') is-invalid @enderror">
                @error('direccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin dirección --}}
        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Cliente" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>

{{-- Tabla de clientes --}}
<div class="row justify-content-center">
    <div class="col-12 justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"># Reg.</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Dirección</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->empresa }}</td>
                    <td>
                        <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-warning">Editar Cliente</a>
                    </td>
                </tr>

                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- fin Tabla de clientes --}}
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection