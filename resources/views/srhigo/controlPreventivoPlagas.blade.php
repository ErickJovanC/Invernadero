@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Control Preventivo de Plagas en Plantas y Arboles</h1>
    <form action="{{ route('plagas.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">
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


                {{-- <div class="form-check form-check-inline">
                    <input class="form-check-input 
                        @error('plagas') is-invalid @enderror" 
                        type="checkbox" 
                        value="Anastrepa Ludems" 
                        id="Anastrepa Ludems"
                        name="plagas[]" 
                        @if( in_array('Anastrepa Ludems', old('plagas', [])) )
                            checked
                        @endif
                    />
                    <label class="form-check-label" for="Anastrepa Ludems">
                        Anastrepa Ludems
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input 
                        @error('plagas') is-invalid @enderror" 
                        type="checkbox" 
                        value="Nematodos" 
                        id="Nematodos"
                        name="plagas[]" 
                        @if( in_array('Nematodos', old('plagas', [])) )
                            checked
                        @endif
                    />
                    <label class="form-check-label" for="Nematodos">
                        Nematodos
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('plagas') is-invalid @enderror" 
                        type="checkbox" value="Gallina Ciega" name="plagas[]" id="Gallina Ciega"
                        @if( in_array('Gallina Ciega', old('plagas', [])) )
                            checked
                        @endif
                    />
                    <label class="form-check-label" for="Gallina Ciega">
                        Gallina Ciega
                    </label>
                </div> --}}

                @error('plagas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione al menos una plaga</strong>
                    </span>
                @enderror
            </div>{{-- Fin Plagas a prevenir --}}

            @include('srhigo.campos.fecha')

            {{-- Acción Preventiva --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="accionPreventiva">Acción Preventiva</label>
                <input type="text" 
                    name="accionPreventiva" 
                    id="accionPreventiva" 
                    value="{{ old('accionPreventiva') }}"
                    class="form-control @error('accionPreventiva') is-invalid @enderror"
                />
                @error('accionPreventiva')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Acción Preventiva --}}

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