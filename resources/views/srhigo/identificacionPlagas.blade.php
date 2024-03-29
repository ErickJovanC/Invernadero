@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Identificacion de Plagas</h1>
    <form action="{{ route('identificacionPlagas.store') }}" method="post" class="col-12" enctype="multipart/form-data">
    @csrf
        <div class="row align-items-end">
            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Periodo de Monitoreo --}}
            <div class="col-12 col-md-6 mb-5 form-group">
                <div class="h2 text-center  ">Periodo de Monitoreo</div>
                <div class="form-check">
                    <input 
                    type="radio" 
                    name="periodoMonitoreo" 
                    id="preparacionSuelo" 
                    value="Preparación del Suelo"
                    {{ old('periodoMonitoreo') == 'Preparación del Suelo' ? 'checked' :  '' }}
                    class="@error('periodoMonitoreo') is-invalid @enderror" 
                    />
                    <label class="form-check-label" for="preparacionSuelo">Preparación del suelo para siembra</label>
                </div>

                <div class="form-check">
                    <input 
                        type="radio" 
                        name="periodoMonitoreo" 
                        id="brotacion" 
                        value="Brotación"
                        {{ old('periodoMonitoreo') == 'Brotación' ? 'checked' :  '' }}
                        class="@error('periodoMonitoreo') is-invalid @enderror" 
                    />
                    <label class="form-check-label" for="brotacion">Brotación (Hasta un mes despues de la siembra)</label>
                </div>

                <div class="form-check">
                    <input 
                        type="radio" 
                        name="periodoMonitoreo" 
                        id="crecimiento" 
                        value="Crecimiento"
                        {{ old('periodoMonitoreo') == 'Crecimiento' ? 'checked' :  '' }}
                        class="@error('periodoMonitoreo') is-invalid @enderror" 
                    />
                    <label class="form-check-label" for="crecimiento">Crecimiento </label>
                </div>

                <div class="form-check">
                    <input
                        type="radio"
                        name="periodoMonitoreo"
                        id="Cosecha"
                        value="Cosecha"
                        {{ old('periodoMonitoreo') == 'Cosecha' ? 'checked' :  '' }}
                        class="@error('periodoMonitoreo') is-invalid @enderror"
                    />
                    <label class="form-check-label " for="Cosecha">Cosecha</label>
                </div>

                @error('periodoMonitoreo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione el periodo cuando fue detectada la plaga</strong>
                    </span>
                @enderror
            </div> {{-- Fin Periodo de Monitoreo --}}

            {{-- Plagas --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="plaga">Plaga</label>
                <select name="plaga" id="plaga" class="form-control @error('plaga') is-invalid @enderror">
                    <option value="" hidden>¿Cúal es la Plaga Identificada?</option>
                    @foreach ($plagas as $plaga)
                        <option 
                            value="{{ $plaga->id }}" 
                            {{ old('plaga') == $plaga->id ? 'selected' : '' }}
                        >
                            {{ $plaga->nombrePlaga }}
                        </option>
                    @endforeach
                </select>
                @error('plaga')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Plagas --}}

            {{-- Unudad de Muestreo --}}
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="unidadMuestreo">Unidad de muestreo</label>
                <input type="text" 
                name="unidadMuestreo" 
                id="unidadMuestreo"
                value="{{ old('unidadMuestreo')}}"
                class="form-control @error('unidadMuestreo') is-invalid @enderror">
                @error('unidadMuestreo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Unudad de Muestreo--}}
            
            {{-- Cantidad Encontrada  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="cantidadEncontrada">Cantidad Encontrada en la Unidad de muestreo</label>
                <input type="number" 
                min="1"
                name="cantidadEncontrada" 
                id="cantidadEncontrada"
                value="{{ old('cantidadEncontrada')}}"
                class="form-control @error('cantidadEncontrada') is-invalid @enderror">
                @error('cantidadEncontrada')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin  Cantidad Encontrada --}}

            {{-- Daño por Plaga  --}}
            <div class="form-group col-12 mb-5">
                <label for="danioPlaga">Daño provocado por la plaga</label>
                <input type="text" 
                name="danioPlaga" 
                id="danioPlaga"
                value="{{ old('danioPlaga')}}"
                class="form-control @error('danioPlaga') is-invalid @enderror">
                @error('danioPlaga')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Daño por Plaga --}}

            {{-- Fotografía --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" value="{{ old('foto') }}">
                @error('foto')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Fotografía --}}

            @include('srhigo.campos.responsable')

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Identificación de plaga" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection