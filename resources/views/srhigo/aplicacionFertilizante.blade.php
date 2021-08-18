@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="h1 mb-5 col-12 text-center">Aplicación de Fertilizante</h1>
    <form action="{{ route('aplicacionFertilizante.store') }}" method="post" class="col-12">
        @csrf
        <div class="row align-items-end">

            {{-- Fertilizantes --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-5">
                <label for="nombreFertilizante">Fertilizante Aplicado</label>
                <select name="nombreFertilizante" id="nombreFertilizante" class="form-control @error('nombreFertilizante') is-invalid @enderror">
                    <option value="" hidden>Seleccione el fertilizante</option>
                    @foreach ($fertilizantesP as $fertilizante)
                        <option 
                            value="{{ $fertilizante->id }}" 
                            {{ old('nombreFertilizante') == $fertilizante->id ? 'selected' : '' }}
                        >
                            {{ $fertilizante->nombreFertilizante }}
                        </option>
                    @endforeach

                    @foreach ($fertilizantes as $fertilizante)
                        <option 
                            value="{{ $fertilizante->id }}" 
                            {{ old('nombreFertilizante') == $fertilizante->id ? 'selected' : '' }}
                        >
                            {{ $fertilizante->nombreFertilizante }}
                        </option>
                    @endforeach
                </select>
                @error('nombreFertilizante')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Fertilizantes --}}

            {{-- Botón Agregar Fertilizante --}}
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4 mb-5">
                <a href="{{ route('fertilizante.create') }}" class="btn btn-info w-100">Dar de Alta Nuevo Fertilizante</a>
            </div> {{-- Fin Botón Agregar Fertilizante --}}

            @include('srhigo.campos.fecha')

            @include('srhigo.campos.huertaSeccion')

            <div class="form-group col-sm-6 col-md-4 col-lg-2 mb-5">
                <label for="unidades">Unidades (KG | LT)</label>
                <input type="number" name="unidades" id="unidades" 
                    class="form-control @error('unidades') is-invalid @enderror"
                    value="{{ old('unidades') }}"
                />
                @error('unidades')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-sm-6 col-md-4 col-lg-3 mb-5 form-group">
                <div class="form-check-inline">
                    <input 
                        type="radio" 
                        name="unidad" 
                        id="Gramos" 
                        value="Gramos"
                        {{ old('unidad') == 'Gramos' ? 'checked' :  '' }}
                        class="@error('unidad') is-invalid @enderror" 
                    />
                    <label class="form-check-label pl-2" for="Gramos">Gramos </label>
                </div>

                <div class="form-check-inline">
                    <input 
                        type="radio" 
                        name="unidad" 
                        id="Mililitros" 
                        value="Mililitros"
                        {{ old('unidad') == 'Mililitros' ? 'checked' :  '' }}
                        class="@error('unidad') is-invalid @enderror" 
                    />
                    <label class="form-check-label pl-2" for="Mililitros">Mililitros </label>
                </div>
            </div>

            {{-- Precio --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-2 mb-5">
                <label for="precio">Precio por Unidad</label>
                <input type="number" name="precio" id="precio" 
                    class="form-control @error('precio') is-invalid @enderror"
                    value="{{ old('precio') }}"
                />
                @error('precio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Precio --}}

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