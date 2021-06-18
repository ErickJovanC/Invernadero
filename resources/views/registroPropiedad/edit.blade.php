@extends('layouts.app')
@section('content')
<div class="row my-4">
    <h1 class="titulo mb-5 col-12 text-center">Editar Huerta</h1>

    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center p-5">{{ Session::get('mensaje') }}</div>
    @endif

    {{-- Formulario principal --}}
    <form action="{{ route('registroPropiedad.update', $huerta) }}" method="post" class="col-12">
    @csrf
    @method('patch')
        <div class="row mb-4 align-items-end">
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="nombreHuerta">Nombre de la Huerta</label>
                <input type="text" 
                    name="nombreHuerta" 
                    id="nombreHuerta"
                    class="form-control @error('nombreHuerta') is-invalid @enderror"
                    value="{{ old('nombreHuerta') ? old('nombreHuerta') : $huerta->nombreHuerta }}"
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
                    value="{{ old('codigoRegistro') ? old('codigoRegistro') : $huerta->codigoRegistro }}"
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
                        <option 
                            value="{{ $estado->id }}"
                            {{ $huerta->estado_id == $estado->id ? 'selected' : '' }}>{{ $estado->estado }}</option>
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
                        <option 
                            value="{{ $municipio->id }}" 
                            {{ $huerta->municipio_id == $municipio->id ? 'selected' : '' }}
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
                    value="{{ old('colonia') ? old('colonia') :  $huerta->colonia }}"
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
                    value="{{ old('calle') ? old('calle') : $huerta->calle }}"
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
                    value="{{ old('comunidad') ? old('comunidad') : $huerta->comunidad }}"
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
                <a href="{{ route('registroPropiedad.create') }}"
                    class="btn btn-secondary mr-3">
                    Cancelar edición
                </a>
                <input type="submit" value="Editar Huerta" class="btn btn-warning px-5">
            </div>
        </div>
    </form>
</div>
@endsection