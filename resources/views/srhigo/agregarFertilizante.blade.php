@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Agregar Fertilizante</h1>
    <form action="{{ route('fertilizante.store') }}" method="post" class="col-12">
    @csrf
        <div class="row">
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

            <div class="form-group col-12 col-md-6 mb-5">
                <label for="micronutrientes">Micronutrientes</label>
                <input type="text" name="micronutrientes" id="micronutrientes" class="form-control @error('micronutrientes') is-invalid @enderror">
                @error('micronutrientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

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
            
        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar  Fertilizante" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection