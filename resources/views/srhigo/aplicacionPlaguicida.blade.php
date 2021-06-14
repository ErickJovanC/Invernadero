@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Plaguicidas</h1>
    <form action="{{ route('aplicacionPlaguicida.store') }}" method="post" class="col-12">
    @csrf
        <div class="row align-items-end">
            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Tiempo de Aplicación  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5 text-center">
                <span>Tiempo de aplicación</span>
                <div class="row">
                    <div class="col-6">
                        <label for="horas">Horas</label>
                        <input type="number"
                        name="horas"
                        id="horas"
                        min="0"
                        value="{3{ old('horas')}}"
                        class="form-control @error('horas') is-invalid @enderror">
                        @error('horas')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6">
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

            {{-- Tipo de Plaguicida --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="tipoPlaguicida">Tipo de Plaguicida</label>
                <select name="tipoPlaguicida" id="tipoPlaguicida" class="form-control @error('tipoPlaguicida') is-invalid @enderror">
                    <option value="" hidden>Tipo de Plaguicida</option>
                    <option 
                        value="Herbicida"
                        {{ old('tipoPlaguicida') == 'Herbicida' ? 'selected' : '' }}
                    />
                        Herbicida
                    </option>
                    <option 
                        value="Fungicida"
                        {{ old('tipoPlaguicida') == 'Fungicida' ? 'selected' : '' }}
                    />
                        Fungicida
                    </option>
                    <option 
                        value="Pesticida"
                        {{ old('tipoPlaguicida') == 'Pesticida' ? 'selected' : '' }}
                    />
                        Pesticida
                    </option>
                </select>
                @error('tipoPlaguicida')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Tipo de Plaguicida --}}


            <div class="col-12 h2 text-center">Plaguicida Aplicado</div>

            {{-- Nombre Comercial del Plaguicida  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="nombreComercial">Nombre Comercial</label>
                <input type="text" 
                name="nombreComercial" 
                id="nombreComercial"
                value="{{ old('nombreComercial')}}"
                class="form-control @error('nombreComercial') is-invalid @enderror">
                @error('nombreComercial')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Nombre Comercial del Plaguicida --}}

            {{-- Ingrediente Activo  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="ingredienteActivo">Ingrediente Activo</label>
                <input type="text" 
                name="ingredienteActivo" 
                id="ingredienteActivo"
                value="{{ old('ingredienteActivo')}}"
                class="form-control @error('ingredienteActivo') is-invalid @enderror">
                @error('ingredienteActivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Ingrediente Activo --}}

            {{-- Color de la Banda --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="colorBanda">Color de la Banda</label>
                <select name="colorBanda" id="colorBanda" class="form-control @error('colorBanda') is-invalid @enderror">
                    <option value="" hidden>Color de la banda</option>
                    <option 
                        value="Verde"
                        {{ old('colorBanda') == 'Verde' ? 'selected' : '' }}
                    />
                        Verde
                    </option>
                    <option 
                        value="Azul"
                        {{ old('colorBanda') == 'Azul' ? 'selected' : '' }}
                    />
                        Azul
                    </option>
                    <option 
                        value="Amarillo"
                        {{ old('colorBanda') == 'Amarillo' ? 'selected' : '' }}
                    />
                        Amarillo
                    </option>
                    <option 
                        value="Rojo"
                        {{ old('colorBanda') == 'Rojo' ? 'selected' : '' }}
                    />
                        Rojo
                    </option>
                </select>
                @error('colorBanda')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Color de la Banda --}}


            {{-- Dosis Aplicada  --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
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