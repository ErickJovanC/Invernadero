@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Plaguicidas</h1>
    <form action="{{ route('aplicacionPlaguicida.store') }}" method="post" class="col-12">
    @csrf
        <div class="row align-items-end">
            @include('srhigo.campos.fecha')

            {{-- Tiempo de Aplicación  --}}
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="tiempoAplicacion">Tiempo Aplicacion (Horas:Minutos)</label>
                <input type="text"
                name="tiempoAplicacion" 
                id="tiempoAplicacion"
                value="{{ old('tiempoAplicacion')}}"
                class="form-control @error('tiempoAplicacion') is-invalid @enderror">
                @error('tiempoAplicacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Tiempo de Aplicación --}}

            {{-- Tipo de Plaguicida  --}}
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="tipoPlaguicida">Tipo de Plaguicida</label>
                <input type="text" 
                name="tipoPlaguicida" 
                id="tipoPlaguicida"
                value="{{ old('tipoPlaguicida')}}"
                class="form-control @error('tipoPlaguicida') is-invalid @enderror">
                @error('tipoPlaguicida')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Tipo de Plaguicida --}}

            <div class="col-12 h2 text-center">Plaguicida Aplicado</div>

            {{-- Nombre Comercial del Plaguicida  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="nombreComercial">Nombre Comercial</label>
                <input type="text" 
                name="nombreComercial" 
                id="nombreComercial"
                value="{{ old('nombreComercial')}}"
                class="form-control @error('nombreComercial') is-invalid @enderror">
                @error('nombreComercial')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Nombre Comercial del Plaguicida --}}

            {{-- Ingrediente Activo  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="ingredienteActivo">Ingrediente Activo</label>
                <input type="text" 
                name="ingredienteActivo" 
                id="ingredienteActivo"
                value="{{ old('ingredienteActivo')}}"
                class="form-control @error('ingredienteActivo') is-invalid @enderror">
                @error('ingredienteActivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Ingrediente Activo --}}

            {{-- Color de la Banda  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="colorBanda">Color de la Banda</label>
                <input type="text" 
                name="colorBanda" 
                id="colorBanda"
                value="{{ old('colorBanda')}}"
                class="form-control @error('colorBanda') is-invalid @enderror">
                @error('colorBanda')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Color de la Banda --}}

            {{-- Dosis Aplicada  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="dosisAplicada">Dosis Aplicada</label>
                <input type="text" 
                name="dosisAplicada" 
                id="dosisAplicada"
                value="{{ old('dosisAplicada')}}"
                class="form-control @error('dosisAplicada') is-invalid @enderror">
                @error('dosisAplicada')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Dosis Aplicada --}}

            @include('srhigo.campos.responsable')
        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Plaguicida" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection