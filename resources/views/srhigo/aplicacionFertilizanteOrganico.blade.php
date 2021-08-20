@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Fertilizante Oranico</h1>
    <form action="{{ route('aplicacionFertilizanteOrganico.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">

            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Cantidad Aplicada --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="cantidadAplicada">Cantidad Aplicada KG</label>
                <input type="number" 
                    name="cantidadAplicada" 
                    id="cantidadAplicada" 
                    value="{{ old('cantidadAplicada') }}"
                    class="form-control @error('cantidadAplicada') is-invalid @enderror"
                />
                @error('cantidadAplicada')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Cantidad Aplicada --}}

            {{-- Tipo de fertilizante --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="tipoFertilizante">Tipo de fertilizante</label>
                <select name="tipoFertilizante" id="tipoFertilizante" class="form-control @error('tipoFertilizante') is-invalid @enderror">
                    <option value="" hidden>Seleccione el tipo de abono</option>
                    <option value="Ave" 
                        {{ old('tipoFertilizante') == 'Ave' ? 'selected' : '' }}>
                        Ave
                    </option>
                    <option value="Borrego" 
                        {{ old('tipoFertilizante') == 'Borrego' ? 'selected' : '' }}>
                        Borrego</option>
                    <option value="Murcielago" 
                        {{ old('tipoFertilizante') == 'Murcielago' ? 'selected' : '' }}>
                        Murcielago</option>
                    <option value="Porcino" 
                        {{ old('tipoFertilizante') == 'Porcino' ? 'selected' : '' }}>
                        Porcino</option>
                    <option value="Vegetal" 
                        {{ old('tipoFertilizante') == 'Vegetal' ? 'selected' : '' }}>
                        Vegetal</option>
                    <option value="OrganicoQuimico" 
                        {{ old('tipoFertilizante') == 'OrganicoQuimico' ? 'selected' : '' }}>
                        Organico Quimico</option>
                </select>
                @error('tipoFertilizante')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin tipo de fertilizante --}}

            {{-- Costo --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-2 mb-5">
                <label for="costo">Costo Total</label>
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

        </div> {{-- Fin Row --}}

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Fertilizante Organico" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection