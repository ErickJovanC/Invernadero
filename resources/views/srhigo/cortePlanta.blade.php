@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="h1 mb-5 col-12 text-center">Control de podas (extracción)</h1>
    <form action="{{ route('cortePlanta.store') }}" method="post" class="col-12">
        @csrf
        <div class="row align-items-end">
            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Plantas cortadas --}}
            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-3 col-xl-1 mb-5">
                <label for="cantidad">Plantas Retiradas (extracción)</label>
                <input type="number" min="1" name="cantidad" id="cantidad" 
                    value="{{ old('cantidad') }}" 
                    class="form-control @error('cantidad') is-invalid @enderror">
                @error('cantidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Plantas cortadas --}}

            @include('srhigo.campos.responsable')

            {{-- Motivo del corte --}}
            <div class="form-group col-12 mb-5">
                <label for="motivo">Motivo del corte</label>
                <input type="text" name="motivo" id="motivo" 
                    value="{{ old('motivo') }}" 
                    class="form-control @error('motivo') is-invalid @enderror">
                @error('motivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Motivo del corte --}}

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Corte de Plantas" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
@endsection