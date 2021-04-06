@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de siembra</h1>
    <form action="{{ route('registroSiembra.store') }}" method="post">
    @csrf
        <div class="row mb-4">
            
            {{-- Lote de plantas --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="lotePlanta">No. de Lote de la Planta a tratar</label>
                <select name="lotePlanta" id="lotePlanta" class="form-control @error('lotePlanta') is-invalid @enderror">
                    <option value="" hidden>Seleccione el Lote de la planta</option>
                    @foreach ($lotes as $lote)
                        <option 
                            value="{{ $lote->id }}"
                            {{ old('lote') == $lote->id ? 'selected' : '' }}
                        />
                        {{ $lote->lote }}
                        </option>
                    @endforeach
                </select>
                @error('lotePlanta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Lote de plantas --}}

            {{-- Esto se encuentra dentro del lote
                <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Varidad">Variedad</label>
                <div class="alert alert-danger">Hacer lista selectiva</div>
                <input type="text" name="Variedad" id="Variedad" class="form-control">
            </div> --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaSiembra">Fecha de Acción</label>
                <input type="date" 
                    name="fechaSiembra" 
                    id="fechaSiembra"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaSiembra') }}"
                    class="form-control 
                        @error('fechaSiembra') is-invalid @enderror" 
                />
                @error('fechaSiembra')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            <div class="col-sm-12 col-md-6 mb-5">
                <span>Distanciamiento de siembra</span>
                <div class="row">

                    <div class="col-6">
                        <label for="distanciaPlanta">Entre plantas (Metros)</label>
                        <input type="text" 
                            name="distanciaPlanta" 
                            id="distanciaPlanta" 
                            value="{{ old('distanciaPlanta') }}"
                            class="form-control @error('distanciaPlanta') is-invalid @enderror"
                        />
                        @error('distanciaPlanta')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="distanciaVesana">Entre vesana (Metros)</label>
                        <input type="text" 
                        name="distanciaVesana" 
                        id="distanciaVesana" 
                        value="{{ old('distanciaVesana') }}"
                        class="form-control @error('distanciaVesana') is-invalid @enderror">
                        @error('distanciaVesana')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    
                </div> 
            </div> {{-- Fin Distanciamiento de siembra --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="riego">Tipo de riego</label>
                <select name="riego" id="riego" class="form-control @error('riego') is-invalid @enderror">
                    <option value="" hidden>Seleccione el tipo de rigo</option>
                    <option value="riegoPesado" 
                        {{ old('lote') == 'riegoPesado' ? 'selected' : '' }}>
                        Riego Pesado (Inundación)
                    </option>
                    <option value="riegoLigero">Riego Ligero</option>
                    <option value="gravedad">Gravedad (Manual)</option>
                </select>
                @error('riego')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="responsable">Responsable</label>
                <select name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror">
                    <option value="" hidden>Seleccione el empleado</option>
                    @foreach ($empleados as $empleado)
                        <option 
                            value="{{ $empleado->id }}" 
                            {{ old('seccion') == $empleado->id ? 'selected' : '' }}
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
                <input type="submit" value="Registrar siembra" class="btn btn-primary px-5">
            </div>
        </div>

    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection