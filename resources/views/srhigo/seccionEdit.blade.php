@extends('layouts.app')
@section('content')
{{-- <a href="{{ route('main') }}" class="btn btn-success">Menú</a> --}}
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Secciones</h1>
    
    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center">
            {!! Session::get('mensaje') !!}
        </div>
    @endif

    {{-- Formulario principal --}}
    <form action="{{ route('seccion.update', $seccion) }}" method="post" class="col-12">
    @csrf
    @method('patch')
        <div class="row">
            {{-- Propiedad --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="propiedad">Huerta</label>
                <select name="propiedad" id="propiedad" 
                    class="form-control @error('propiedad') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione la huerta</option>
                    @foreach ($huertas as $huerta)
                        <option 
                            value="{{ $huerta->id }}" 
                            {{ $seccion->propiedad_id == $huerta->id ? 'selected' : '' }}
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

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="nombreSeccion">Nombre o número de Sección</label>
                <input type="text" 
                    name="nombreSeccion" id="nombreSeccion" 
                    class="form-control @error('nombreSeccion') is-invalid @enderror" 
                    value="{{ old('nombreSeccion') ? old('nombreSeccion') : $seccion->nombreSeccion }}"
                />
                @error('nombreSeccion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="cantidadPlantas">
                    ¿Cuantas plantas tiene en esta sección?
                </label>
                <input type="number" 
                    name="cantidadPlantas" 
                    id="cantidadPlantas" 
                    min="0"
                    value="{{ old('cantidadPlantas') ? old('cantidadPlantas') : $seccion->cantidadPlantas}}"
                    class="form-control @error('cantidadPlantas') is-invalid @enderror" 
                />
                @error('cantidadPlantas')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>
        </div>

        {{-- Botones --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <a href="{{ route('seccion.create') }}"
                    class="btn btn-secondary mr-3">
                    Cancelar edición
                </a>
                <input type="submit" value="Editar Sección" class="btn btn-warning px-5">
            </div>
        </div>
    </form>
</div>
@endsection