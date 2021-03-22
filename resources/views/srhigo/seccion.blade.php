@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Secciones</h1>
    <form action="{{ route('seccion.store') }}" method="post" class="col-12">
    @csrf
        <div class="row">
            {{-- Propiedad --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="propiedad">Huerta</label>
                <select name="propiedad" id="propiedad" 
                    class="form-control @error('propiedad') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione la huerta</option>
                    @foreach ($huertas as $huerta)
                        <option 
                            value="{{ $huerta->id }}" 
                            {{ old('propiedad') == $huerta->id ? 'selected' : '' }}
                        >
                            {{ $huerta->nombreHuerta }}
                        </option>
                    @endforeach
                </select>
                @error('propiedad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Propiedad --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="nombreSeccion">Nombre o número de Sección</label>
                <input type="text" 
                    name="nombreSeccion" id="nombreSeccion" 
                    class="form-control @error('nombreSeccion') is-invalid @enderror" 
                    value="{{ old('nombreSeccion') }}"
                />
                @error('nombreSeccion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>
        </div>

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Sección" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection