@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row mt-4">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Huerta</h1>
    <form action="{{ route('registroPropiedad.store') }}" method="post" class="col-12">
    @csrf
        <div class="row mb-4">
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="nombreHuerta">Nombre de la Huerta</label>
                <input type="text" 
                    name="nombreHuerta" 
                    id="nombreHuerta"
                    class="form-control @error('nombreHuerta') is-invalid @enderror"
                    value="{{ old('nombreHuerta') }}"
                >
                @error('nombreHuerta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="codigoRegistro">Código de registro (Senasica)</label>
                <input type="text" 
                    name="codigoRegistro" 
                    id="codigoRegistro" 
                    class="form-control"
                >
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="estado">Estado</label>
                <select name="estado"
                    id="estado" 
                    class="form-control @error('estado') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione el estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                    @endforeach
                </select>
                @error('estado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="municipio">Municipio</label>
                <select name="municipio" id="municipio" 
                    class="form-control @error('municipio') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione el municipio</option>
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}">{{ $municipio->municipio }}</option>
                    @endforeach
                </select>
                @error('municipio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="colonia">Colonia</label>
                <input type="text" name="colonia" id="colonia" 
                    class="form-control @error('colonia') is-invalid @enderror"
                    value="{{ old('colonia') }}"
                >
                @error('colonia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="calle">Calle y Número</label>
                <input type="text" name="calle" id="calle" 
                    class="form-control @error('calle') is-invalid @enderror"
                    value="{{ old('calle') }}"
                >
                @error('calle')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="comunidad">Comunidad, Predio y/o Campo</label>
                <input type="text" name="comunidad" id="comunidad" 
                    class="form-control @error('comunidad') is-invalid @enderror"
                    value="{{ old('comunidad') }}"
                >
                @error('comunidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-12">
                <label for="Ubicacion">Ubicación</label>
                <input type="text" name="Ubicacion" class="form-control">
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Propiedad" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection