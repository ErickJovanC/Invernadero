@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row mt-4">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Huerta</h1>
    <form action="" method="post" class="col-12">
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
                <input type="text" 
                    name="estado"
                    id="estado" 
                    class="form-control @error('estado') is-invalid @enderror"
                    value="{{ old('estado') }}"
                >
                @error('estado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="municipio">Municipio</label>
                <input type="text" name="municipio" id="municipio" 
                    class="form-control @error('municipio') is-invalid @enderror" 
                    value="{{ old('municipio') }}"
                >
                @error('municipio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
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

            <div class="form-group col-sm-12 col-md-6 mb-5">
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

            {{-- <div class="form-group  col-sm-12 col-md-6 mb-5">
                <label for="Cultivo1">Cultivo1</label>
                <input type="text" name="Cultivo1" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension">Extensión (m2)</label>
                <input type="text" name="Extension" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Cultivo2">Cultivo2</label>
                <input type="text" name="Cultivo2" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension2">Extensión 2 (m2)</label>
                <input type="text" name="Extension2" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Cultivo3">Cultivo3</label>
                <input type="text" name="Cultivo3" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension3">Extensión 3 (m2)</label>
                <input type="text" name="Extension3" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Cultivo4">Cultivo4</label>
                <input type="text" name="Cultivo4" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension4">Extensión 4 (m2)</label>
                <input type="text" name="Extension4" class="form-control">
            </div> --}}

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