@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Plaguicidas</h1>
    <form action="{{ route('aplicacionPlaguicida.store') }}" method="post" class="col-12">
    @csrf
        <div class="row align-items-end">

            {{-- Plaguicida Aplicado --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-5">
                <label for="plaguicida">Plaguicida Aplicado</label>
                <select name="plaguicida" id="plaguicida" class="form-control @error('plaguicida') is-invalid @enderror">
                    <option value="" hidden>Plaguicida Aplicado</option>
                    @foreach ($plaguicidas as $plaguicida)
                        <option 
                            value="{{ $plaguicida->id }}" 
                            {{ old('plaguicida') == $plaguicida->id ? 'selected' : '' }}
                        >
                            {{ $plaguicida->ingredienteActivo ." - ".
                                $plaguicida->nombreComercial ." : ".
                                $plaguicida->colorBanda }}
                        </option>
                    @endforeach
                </select>
                @error('plaguicida')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Plaguicida Aplicado --}}

            {{-- Botón Agregar Plaguicida --}}
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-5">
                <a href="{{ route('plaguicida.create') }}" class="btn btn-danger w-100">Alta Nuevo Plaguicida</a>
            </div> {{-- Fin Botón Agregar Plaguicida --}}

            <div class="w-100"></div>

            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Plagas --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="plaga">Plaga a tratar</label>
                <select name="plaga" id="plaga" class="form-control @error('plaga') is-invalid @enderror">
                    <option value="" hidden>Seleccione...</option>
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

            {{-- Tiempo de Aplicación  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-5 text-center">
                <span>Tiempo de aplicación</span>
                <div class="row">
                    <div class="col-6 pr-0">
                        <label for="horas">Horas</label>
                        <input type="number"
                        name="horas"
                        id="horas"
                        min="0"
                        value="{{ old('horas')}}"
                        class="form-control @error('horas') is-invalid @enderror">
                        @error('horas')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 pl-0">
                        <label for="minutos">Minutos</label>
                        <input type="number"
                        name="minutos"
                        id="minutos"
                        min="0"
                        value="{{ old('minutos')}}"
                        class="form-control @error('minutos') is-invalid @enderror">
                        @error('minutos')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>{{-- Fin  Tiempo de Aplicación --}}

            {{-- Dosis Aplicada  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-5">
                <label for="dosisAplicada">Dosis Aplicada (Litros)</label>
                <input type="text" 
                name="dosisAplicada" 
                id="dosisAplicada"
                value="{{ old('dosisAplicada')}}"
                class="form-control @error('dosisAplicada') is-invalid @enderror">
                @error('dosisAplicada')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Dosis Aplicada --}}

            {{-- Dosis Aplicada  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-5">
                <label for="agua">Agua Utilizada (Litros)</label>
                <input type="text" 
                name="agua" 
                id="agua"
                value="{{ old('agua')}}"
                class="form-control @error('agua') is-invalid @enderror">
                @error('agua')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Dosis Aplicada --}}

            @include('srhigo.campos.responsable')
        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Plaguicida" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection