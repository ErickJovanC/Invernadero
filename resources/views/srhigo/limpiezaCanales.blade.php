@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Limpieza y Mantenimiento de Canales de Riego</h1>
    <form action="{{ route('limpiezaCanales.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">
            
            {{-- Huerta --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="huerta">Huerta</label>
                <select name="huerta" id="huerta" class="form-control @error('huerta') is-invalid @enderror">
                    <option value="" hidden>Seleccione la huerta</option>
                    @foreach ($huertas as $huerta)
                        <option 
                            value="{{ $huerta->id }}"
                            {{ old('huerta') == $huerta->id ? 'selected' : '' }}
                        />
                        {{ $huerta->nombreHuerta }}
                        </option>
                    @endforeach
                </select>
                @error('huerta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Huerta --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaLimpieza">Fecha de Aplicación</label>
                <input type="date" 
                    name="fechaLimpieza" 
                    id="fechaLimpieza"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaLimpieza') }}"
                    class="form-control 
                        @error('fechaLimpieza') is-invalid @enderror" 
                />
                @error('fechaLimpieza')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Nombre canal --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="nombreCanal">Nombre o número del canal a limpiar</label>
                <input type="text" 
                    name="nombreCanal" 
                    id="nombreCanal" 
                    value="{{ old('nombreCanal') }}"
                    class="form-control @error('nombreCanal') is-invalid @enderror"
                />
                @error('nombreCanal')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Nombre canal --}}

            {{-- Longitud Canal --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="longitudCanal">Longitud de canal limpiado o reparado (metros)</label>
                <input type="number" 
                    name="longitudCanal" 
                    id="longitudCanal" 
                    value="{{ old('longitudCanal') }}"
                    class="form-control @error('longitudCanal') is-invalid @enderror"
                />
                @error('longitudCanal')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Longitud Canal --}}

            <div class="w-100"></div>

            <div class="col-12 text-center">
                <span class="h1">Acción</span>
            </div>

            <div class="form-group col-sm-12 col-md-4 mb-5">
                <label for="reparacion">Reparación</label>
                <input type="text" name="reparacion" id="reparacion" value="{{ old('reparacion') }}" class="form-control @error('reparacion') is-invalid @enderror">
                @error('reparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-4 mb-5">
                <label for="corteVegetal">Corte de cobertura vegetal</label>
                <input type="text" name="corteVegetal" id="corteVegetal" value="{{ old('corteVegetal') }}" class="form-control @error('corteVegetal') is-invalid @enderror">
                @error('corteVegetal')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-4 mb-5">
                <label for="desasolve">Desasolve</label>
                <input type="text" name="desasolve" id="desasolve" value="{{ old('desasolve') }}" class="form-control @error('desasolve') is-invalid @enderror">
                @error('desasolve')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="w-100"></div>

            <div class="form-group col-sm-12 mb-5">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" value="{{ old('observaciones') }}" rows="4" class="form-control @error('observaciones') is-invalid @enderror"></textarea>
                @error('observaciones')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            @include('srhigo.campos.responsable')

        </div> {{-- Fin row del formulario --}}

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Mantenimiento" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection