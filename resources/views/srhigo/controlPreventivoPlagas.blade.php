@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Control Preventivo de Plagas en Plantas y Arboles</h1>
    <form action="{{ route('plagas.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">

            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Plagas a prevenir --}}
            <div class="col-12 text-center mb-5">
                <div class="@error('plagas') is-invalid @enderror">Plagas a Prevenir</div>

                @foreach($plagas as $plaga)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('plagas') is-invalid @enderror" 
                            type="checkbox" 
                            value="{{ $plaga->nombrePlaga }}" 
                            id="{{ $plaga->nombrePlaga }}"
                            name="plagas[]" 
                            @if( in_array('{{ $plaga->nombrePlaga }}', old('plagas', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="{{ $plaga->nombrePlaga }}">
                            {{ $plaga->nombrePlaga }}
                        </label>
                    </div>
                @endforeach

                @error('plagas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione al menos una plaga</strong>
                    </span>
                @enderror
            </div>{{-- Fin Plagas a prevenir --}}

            {{-- Acción Preventiva --}}
            <div class="col-12 text-center mb-5">
                <div class="@error('accionPreventiva') is-invalid @enderror">Acción Preventiva</div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Fumigación" 
                            id="fumigacion"
                            name="accionPreventiva[]" 
                            @if( in_array('Fumigación', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="fumigacion">
                            Fumigación
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Lavado de Planta" 
                            id="lavado"
                            name="accionPreventiva[]" 
                            @if( in_array('Lavado de Planta', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="lavado">
                            Lavado de Planta
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Cambio de sustrato" 
                            id="sustrato"
                            name="accionPreventiva[]" 
                            @if( in_array('Cambio de sustrato', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="sustrato">
                            Cambio de sustrato
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Otro" 
                            id="Otro"
                            name="accionPreventiva[]" 
                            @if( in_array('Otro', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="Otro">
                            Otro
                        </label>
                    </div>

                @error('accionPreventiva')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione al menos una acción realizada</strong>
                    </span>
                @enderror
            </div>{{-- Fin Acción Preventiva --}}

            @include('srhigo.campos.responsable')

        </div>
        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Acción Preventiva" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@php
    //var_dump($plagas);
@endphp

@endsection