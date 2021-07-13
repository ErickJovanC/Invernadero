@extends('layouts.basico')
@section('content')
{{-- <a href="{{ route('main') }}" class="btn btn-success">Menú</a> --}}
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Gracias por su registro en Sr. Higo</h1>
    <h2 class="h1 alert alert-info">Ahora debe de registrar su huerta, si es propietario de más de una huerta, la podra resgitrar posteriormente.</h2>
    <form action="{{ route('registroPropiedad.store') }}" method="post" class="col-12">
        @csrf
        <div class="row mb-4 align-items-end">
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
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

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="codigoRegistro">Código de registro (Senasica)</label>
                <input type="text" 
                    name="codigoRegistro" 
                    id="codigoRegistro" 
                    class="form-control @error('codigoRegistro') is-invalid @enderror"
                    value="{{ old('codigoRegistro') }}"
                >
                @error('codigoRegistro')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="estado">Estado</label>
                <select name="estado"
                    id="estado" 
                    class="form-control @error('estado') is-invalid @enderror"
                >
                    {{-- <option value="" hidden>Seleccione el estado</option> --}}
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}"
                            {{ old('estado') == $estado->id ? 'selected' : '' }}
                            >{{ $estado->estado }}</option>
                    @endforeach
                </select>
                @error('estado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="municipio">Municipio</label>
                <select name="municipio" id="municipio" 
                    class="form-control @error('municipio') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione el municipio</option>
                    @foreach($municipios as $municipio)
                        <option value="{{ $municipio->id }}" 
                            {{ old('municipio') == $municipio->id ? 'selected' : '' }}
                            >{{ $municipio->municipio }}</option>
                    @endforeach
                </select>
                @error('municipio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
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

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
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

            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
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

        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Huerta" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
@endsection