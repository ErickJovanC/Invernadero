@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Cosecha</h1>
    <form action="{{ route('cosecha.store') }}" method="post" class="col-12">
    @csrf
        <div class="row align-items-end">
            {{-- Cliente (Destinatario) --}}
            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="cliente">Cliente (Destinatario)</label>
                <select name="cliente" id="cliente" class="form-control @error('cliente') is-invalid @enderror">
                    <option value="" hidden>Cliente destinatario</option>
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
            <div class="col-sm-12 col-md-6 col-lg-6 mb-5">
                <a href="{{ route('cliente.create') }}" class="btn btn-info px-5">Registrar Nuevo destinatario</a>
            </div> {{-- Fin Botón Agregar Cliente --}}

            <div class="w-100"></div>
            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Kilos --}}
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3 mb-5">
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
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-2 mb-5">
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
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3 mb-5">
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
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-3 mb-5">
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
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-2 mb-5">
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
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-2 mb-5">
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
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-2 mb-5">
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

            {{-- Capacidad de las taras --}}
            <div class="form-group col-12 col-sm-6 col-md-3 col-lg-2 mb-5">
                <label for="capacidadTara">Capacidad de las taras</label>
                <select name="capacidadTara" id="capacidadTara" class="form-control @error('taras') is-invalid @enderror">
                    <option value="" hidden>Seleccionar...</option>
                    <option value="5kg" {{ old('capacidadTara') == '5kg' ? 'selected' : '' }}>5 kg</option>
                    <option value="8kg" {{ old('capacidadTara') == '8kg' ? 'selected' : '' }}>8 kg</option>
                    <option value="18kg" {{ old('capacidadTara') == '18kg' ? 'selected' : '' }}>18 kg</option>
                </select>
                @error('capacidadTara')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Capacidad de las taras --}}

            {{-- Costo --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-2 mb-5">
                <label for="costo">Costo de la Actividad</label>
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

            {{-- Precio de Venta Total --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-2 mb-5">
                <label for="precioVenta">Precio de Venta Total</label>
                <input type="number" 
                    name="precioVenta" 
                    id="precioVenta"
                    min="0"
                    step="0.5"
                    value="{{ old('precioVenta') }}"
                    class="form-control 
                        @error('precioVenta') is-invalid @enderror" 
                />
                @error('precioVenta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Precio de Venta Total --}}

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="responsable">Responsable</label>
                <select name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror">
                    <option value="" hidden>Seleccione el empleado</option>
                    @foreach ($empleados as $empleado)
                        <option 
                            value="{{ $empleado->id }}" 
                            {{ old('responsable') == $empleado->id ? 'selected' : '' }}
                        >
                            {{ $empleado->nombreEmpleado ." ".
                                $empleado->apellidoEmpleado ." (".
                                $empleado->sobrenombreEmpleado .")"}}
                        </option>
                    @endforeach
                </select>
                @error('responsable')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Responsable --}}

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