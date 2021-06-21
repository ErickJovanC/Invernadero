@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Limpieza y Mantenimiento de Canales de Riego</h1>
    <form action="{{ route('limpiezaCanales.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">
            
            {{-- Huerta --}}
            <div class="form-group col-sm-12 col-md-6  col-lg-4 mb-5">
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

            @include('srhigo.campos.fecha')

            {{-- Nombre canal --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
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
            <div class="form-group col-sm-12 col-md-6  col-lg-4 mb-5">
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

            {{-- Revestimiento --}}
            <div class="form-group col-sm-12 col-md-6  col-lg-4 mb-5">
                <label for="revestimiento">Revestimiento</label>
                <select name="revestimiento" id="revestimiento" class="form-control @error('revestimiento') is-invalid @enderror">
                    <option value="" hidden>Seleccione el tipo de revestimiento</option>
                    <option 
                        value="Tierra"
                        {{ old('revestimiento') == 'Tierra' ? 'selected' : '' }}
                    />
                        Tierra
                    </option>
                    <option 
                        value="Cemento"
                        {{ old('revestimiento') == 'Cemento' ? 'selected' : '' }}
                    />
                        Cemento
                    </option>
                    <option 
                        value="Tubo"
                        {{ old('revestimiento') == 'Tubo' ? 'selected' : '' }}
                    />
                        Tubo
                    </option>
                </select>
                @error('revestimiento')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Revestimiento --}}

            <div class="w-100"></div>

            {{-- Acciones Realizadas --}}
            <div class="col-12 text-center">
                <div class="@error('revestimiento') is-invalid @enderror">Acciones Realizadas</div>
                
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('accion') is-invalid @enderror" 
                        type="checkbox" value="Reparación" name="accion[]" id="reparacion"
                        @if( in_array('Reparación', old('accion', [])) )
                            checked
                        @endif
                    />
                    <label class="form-check-label" for="reparacion">
                        Reparación
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('accion') is-invalid @enderror" 
                        type="checkbox" value="Corte de Maleza" name="accion[]" id="corteMaleza"
                        @if( in_array('Corte de Maleza', old('accion', [])) )
                            checked
                        @endif
                    />
                    <label class="form-check-label" for="corteMaleza">
                        Corte de Maleza
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('accion') is-invalid @enderror" 
                        type="checkbox" value="Desazolve" name="accion[]" id="desazolve"
                        @if( in_array('Desazolve', old('accion', [])) )
                            checked
                        @endif
                    />
                    <label class="form-check-label" for="desazolve">
                        Desazolve
                    </label>
                </div>
                @error('accion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione al menos una acción</strong>
                    </span>
                @enderror
            </div> {{-- Fin Acciones Realizadas --}}

            <div class="w-100"></div>

            <div class="form-group col-sm-12 mb-5">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" 
                    rows="4" 
                    class="form-control @error('observaciones') is-invalid @enderror"
                >{{ old('observaciones') }}</textarea>
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