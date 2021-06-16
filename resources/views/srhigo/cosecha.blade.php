@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Cosecha</h1>
    <form action="{{ route('cosecha.store') }}" method="post" class="col-12">
    @csrf
        <div class="row align-items-end">
            {{-- Cliente (Destinatario) --}}
            <div class="form-group col-12 col-sm-6 col-md-4 mb-5">
                <label for="cliente">Cliente (Destinatario)</label>
                <select name="cliente" id="cliente" class="form-control @error('cliente') is-invalid @enderror">
                    <option value="">¿Cual es el destino?</option>
                    @foreach ($clientes as $cliente)
                        <option 
                            value="{{ $cliente->id }}"
                            {{ old('cliente') == $cliente->id ? 'selected' : '' }} 
                            />
                            {{ $cliente->nombre .' '. $cliente->apellido .' ('. $cliente->empresa .')'  }}</option>
                    @endforeach
                </select>
                @error('cliente')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Cliente (Destinatario) --}}

            {{-- Botón Agregar Cliente --}}
            <div class="col-sm-12 col-md-6 col-lg-4">
                <a href="{{ route('cliente.create') }}" class="btn btn-info w-100">Agregar Otro Cliente</a>
            </div> {{-- Fin Botón Agregar Cliente --}}

            <div class="w-100"></div>
            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Kilos --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="kilos">Kilos</label>
                <input type="number" 
                name="kilos" 
                id="kilos"
                value="{{ old('kilos')}}"
                class="form-control @error('kilos') is-invalid @enderror">
                @error('kilos')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Kilos --}}

            {{-- Merma --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="merma">Merma</label>
                <input type="number" 
                name="merma" 
                id="merma"
                value="{{ old('merma')}}"
                class="form-control @error('merma') is-invalid @enderror">
                @error('merma')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Merma --}}

            {{-- Hora de Inicio --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-2 mb-5">
                <label for="horaInicio">Hora de Inicio</label>
                <input type="time" 
                name="horaInicio" 
                id="horaInicio"
                value="{{ old('horaInicio')}}"
                class="form-control @error('horaInicio') is-invalid @enderror">
                @error('horaInicio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Hora de Inicio --}}

            {{-- Hora Final --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-2 mb-5">
                <label for="horaFin">Hora Final</label>
                <input type="time" 
                name="horaFin" 
                id="horaFin"
                value="{{ old('horaFin')}}"
                class="form-control @error('horaFin') is-invalid @enderror">
                @error('horaFin')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Hora Final --}}

            {{-- Temperatura de la Fruta --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="tempFruta">Temperatura de la Fruta (°C)</label>
                <input type="number" 
                name="tempFruta" 
                id="tempFruta"
                value="{{ old('tempFruta')}}"
                class="form-control @error('tempFruta') is-invalid @enderror">
                @error('tempFruta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Temperatura de la Fruta --}}

            {{-- Temperatura del Suelo --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="tempSuelo">Temperatura del Suelo (°C)</label>
                <input type="number" 
                name="tempSuelo" 
                id="tempSuelo"
                value="{{ old('tempSuelo')}}"
                class="form-control @error('tempSuelo') is-invalid @enderror">
                @error('tempSuelo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Temperatura del Suelo --}}

            {{-- Taras --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="taras">Taras</label>
                <input type="number" 
                name="taras" 
                id="taras"
                value="{{ old('taras')}}"
                class="form-control @error('taras') is-invalid @enderror">
                @error('taras')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Taras --}}

            {{-- Material de las taras --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                <label for="material">Material de las Taras</label>
                <select name="material" id="material" class="form-control">
                    <option value="">¿De que material son las material?</option>
                    <option value="Carton" {{ old('material') == 'Carton' ? 'selected' : '' }}>Cartón</option>
                    <option value="Madera" {{ old('material') == 'Madera' ? 'selected' : '' }}>Madera</option>
                    <option value="Plastico" {{ old('material') == 'Plastico' ? 'selected' : '' }}>Plastico</option>
                </select>
                @error('material')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Material de las taras --}}

            @include('srhigo.campos.responsable')

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Cosecha" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection