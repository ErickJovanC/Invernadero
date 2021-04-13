@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="h1 mb-5 col-12 text-center">Aplicación de Fertilizante</h1>
    <form action="{{ route('aplicacionFertilizante.store') }}" method="post" class="col-12">
        @csrf
        <div class="row justify-content-center">

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaAplicacion">Fecha de Aplicación</label>
                <input type="date" 
                    name="fechaAplicacion" 
                    id="fechaAplicacion"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaAplicacion') }}"
                    class="form-control 
                        @error('fechaAplicacion') is-invalid @enderror" 
                />
                @error('fechaAplicacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Nombre fertilizante --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="nombreFertilizante">Nombre Fertilizante</label>
                <input type="text" 
                    name="nombreFertilizante" 
                    id="nombreFertilizante" 
                    value="{{ old('nombreFertilizante') }}"
                    class="form-control @error('nombreFertilizante') is-invalid @enderror"
                />
                @error('nombreFertilizante')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin nombre fertilizante --}}

            <div class="col-12 h1 mt-5 text-center">
                Contenido Nutrintes del Fertilizante
            </div>
            <div class="form-group col-2 mb-5">
                <label for="N">N</label>
                <input type="text" 
                name="N"
                id="N" 
                class="form-control @error('N') is-invalid @enderror">
                @error('N')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2 mb-5">
                <label for="P2O5">P<sub>2</sub>O<sub>5</sub></label>
                <input type="text" name="P2O5" class="form-control @error('P2O5') is-invalid @enderror">
                @error('P2O5')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2 mb-5">
                <label for="K2O">K<sub>2</sub>O</label>
                <input type="text" name="K2O" class="form-control @error('K2O') is-invalid @enderror">
                @error('K2O')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2 mb-5">
                <label for="Ca">Ca</label>
                <input type="text" name="Ca" class="form-control @error('Ca') is-invalid @enderror">
                @error('Ca')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2 mb-5">
                <label for="Mg">Mg</label>
                <input type="text" name="Mg" class="form-control @error('Mg') is-invalid @enderror">
                @error('Mg')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-2 mb-5">
                <label for="S">S</label>
                <input type="text" name="S" class="form-control @error('S') is-invalid @enderror">
                @error('S')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-6 col-md-4 mb-5">
                <label for="micronutrientes">Micronutrientes</label>
                <input type="text" name="micronutrientes" id="micronutrientes" class="form-control @error('micronutrientes') is-invalid @enderror">
                @error('micronutrientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-6 col-md-4 mb-5">
                <label for="kilosHectarea">Kilos por hectarea</label>
                <input type="text" name="kilosHectarea" id="kilosHectarea" class="form-control @error('kilosHectarea') is-invalid @enderror">
                @error('kilosHectarea')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="w-100"></div>

            @include('srhigo.campos.metodoAplicacion')

            @include('srhigo.campos.responsable')

        </div> {{-- Fin Row --}}

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Fertilizante" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection