@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de siembra</h1>
    <form action="{{ route('registroSiembra.store') }}" method="post">
    @csrf
        <div class="row mb-4">

            @include('srhigo.campos.huertaSeccion')
            
            {{-- Lote de plantas --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="lotePlanta">No. de Lote de la Planta a tratar</label>
                <select name="lotePlanta" id="lotePlanta" class="form-control @error('lotePlanta') is-invalid @enderror">
                    <option value="" hidden>Seleccione el Lote de la planta</option>
                    @foreach ($lotes as $lote)
                        <option 
                            value="{{ $lote->id }}"
                            {{ old('lotePlanta') == $lote->id ? 'selected' : '' }} >
                        {{ $lote->lote ." Plantas: ". $lote->cantidadPlantas }}
                        </option>
                    @endforeach
                </select>
                @error('lotePlanta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Lote de plantas --}}

            {{-- Cantidad de plantas a sembrar --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="cantidadPlantasSembradas">Plantas sembradas</label>
                <input type="number" 
                    name="cantidadPlantasSembradas" 
                    id="cantidadPlantasSembradas"
                    max="{{ $fechaActual }}"
                    value="{{ old('cantidadPlantasSembradas') }}"
                    class="form-control 
                        @error('cantidadPlantasSembradas') is-invalid @enderror" 
                />
                @error('cantidadPlantasSembradas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Cantidad de plantas a sembrar --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="fechaSiembra">Fecha de la siembra</label>
                <input type="date" 
                    name="fechaSiembra" 
                    id="fechaSiembra"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaSiembra') }}"
                    class="form-control 
                        @error('fechaSiembra') is-invalid @enderror" 
                />
                @error('fechaSiembra')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            <div class="col-sm-12 col-md-6 col-lg-4 mb-5 text-center">
                <span>Distanciamiento de Siembra</span>
                <div class="row">

                    <div class="col-6">
                        <label for="distanciaPlanta">Entre plantas (Metros)</label>
                        <input type="text" 
                            name="distanciaPlanta" 
                            id="distanciaPlanta" 
                            value="{{ old('distanciaPlanta') }}"
                            class="form-control @error('distanciaPlanta') is-invalid @enderror"
                        />
                        @error('distanciaPlanta')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="distanciaVesana">Entre vesana (Metros)</label>
                        <input type="text" 
                        name="distanciaVesana" 
                        id="distanciaVesana" 
                        value="{{ old('distanciaVesana') }}"
                        class="form-control @error('distanciaVesana') is-invalid @enderror">
                        @error('distanciaVesana')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div> 
            </div> {{-- Fin Distanciamiento de siembra --}}

            {{-- Metodo de Riego --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="riego">Tipo de riego</label>
                <select name="riego" id="riego" class="form-control @error('riego') is-invalid @enderror">
                    <option value="" hidden>Seleccione el tipo de riego</option>
                    <option value="riegoPesado" 
                        {{ old('riego') == 'riegoPesado' ? 'selected' : '' }}>
                        Riego Pesado (Inundación)
                    </option>
                    <option value="riegoLigero" {{ old('riego') == 'riegoLigero' ? 'selected' : '' }}>Riego Ligero</option>
                    <option value="gravedad" {{ old('riego') == 'gravedad' ? 'selected' : '' }}>Gravedad (Manual)</option>
                </select>
                @error('riego')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Metodo Riego --}}

            {{-- Costo --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-5">
                <label for="costo">Costo</label>
                <input type="number" 
                    name="costo" 
                    id="costo"
                    min="0"
                    step="0.5"
                    max="99999.5"
                    value="{{ old('costo') }}"
                    class="form-control 
                        @error('costo') is-invalid @enderror" 
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Costo --}}
            
            @include('srhigo.campos.responsable')

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar siembra" class="btn btn-primary px-5">
            </div>
        </div>

    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection