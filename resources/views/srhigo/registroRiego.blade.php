@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Registro de Riego</h1>
    <form action="{{ route('registroRiego.store') }}" method="post" class="col-12">
    @csrf    
        <div class="row">
            
            {{-- Seccion --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="seccion">Seccion a Regar</label>
                <select name="seccion" id="seccion" class="form-control @error('seccion') is-invalid @enderror">
                    <option value="" hidden>Seleccione la seccion a Regar</option>
                    @foreach ($secciones as $seccion)
                        <option 
                            value="{{ $seccion->id }}"
                            {{ old('seccion') == $seccion->id ? 'selected' : '' }}
                        />
                        {{ $seccion->nombreSeccion }}
                        </option>
                    @endforeach
                </select>
                @error('seccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Seccion --}}

            {{-- Metodo de Riego --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="metodoRiego">Tipo de riego</label>
                <select name="metodoRiego" id="metodoRiego" class="form-control @error('metodoRiego') is-invalid @enderror">
                    <option value="" hidden>Seleccione el tipo de rigo</option>
                    <option value="riegoPesado" 
                        {{ old('metodoRiego') == 'riegoPesado' ? 'selected' : '' }}>
                        Riego Pesado (Inundación)
                    </option>
                    <option value="riegoLigero" {{ old('metodoRiego') == 'riegoLigero' ? 'selected' : '' }}>Riego Ligero</option>
                    <option value="gravedad" {{ old('metodoRiego') == 'gravedad' ? 'selected' : '' }}>Gravedad (Manual)</option>
                </select>
                @error('metodoRiego')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Metodo Riego --}}

            {{-- Fuente de Agua --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fuenteAgua">Fuente de Agua</label>
                <select name="fuenteAgua" id="fuenteAgua" class="form-control @error('fuenteAgua') is-invalid @enderror">
                    <option value="" hidden>Seleccione el origen del agua</option>
                    <option value="Rio" 
                        {{ old('fuenteAgua') == 'Rio' ? 'selected' : '' }}>
                        Rio</option>
                    <option value="Subterraneo" 
                        {{ old('fuenteAgua') == 'Subterraneo' ? 'selected' : '' }}>
                        Subterraneo</option>
                    <option value="Olla" 
                        {{ old('fuenteAgua') == 'Olla' ? 'selected' : '' }}>
                        Olla</option>
                    <option value="Pipa" 
                        {{ old('fuenteAgua') == 'Pipa' ? 'selected' : '' }}>
                        Pipa</option>
                </select>
                @error('fuenteAgua')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fuente de agua --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaRiego">Fecha de Acción</label>
                <input type="date" 
                    name="fechaRiego" 
                    id="fechaRiego"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaRiego') }}"
                    class="form-control 
                        @error('fechaRiego') is-invalid @enderror" 
                />
                @error('fechaRiego')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Hora Inicio--}}
            <div class="form-group col-sm-12 col-md-4 col-lg-3 mb-5">
                <label for="horaInicio">Hora de inicio</label>
                <input type="time" 
                    name="horaInicio"  id="horaInicio" 
                    value="{{ old('horaInicio') }}"
                    class="form-control @error('horaInicio') is-invalid @enderror"
                />
                @error('horaInicio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Hora Inicio--}}

            {{-- Hora Fin--}}
            <div class="form-group col-sm-12 col-md-4 col-lg-3 mb-5">
                <label for="horaFin">Hora de Finalización</label>
                <input type="time" 
                    name="horaFin"  id="horaFin" 
                    value="{{ old('horaFin') }}"
                    class="form-control @error('horaFin') is-invalid @enderror"
                />
                @error('horaFin')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Hora Fin--}}

            {{-- TODO Completar esto JS solo visual, el controlador calculara el tiempo total--}}
            <div class="form-group col-12 col-md-4 col-lg-3">
                <label for="HoraTotal">
                    Tiempo total: 
                </label>
                <span class="h1">
                    00:00 hrs
                </span>
            </div>
            
            {{-- Tambos de agua --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="tambosAgua">Tambos de Agua (200 Listros)</label>
                <input type="number" 
                    name="tambosAgua" id="tambosAgua"
                    value="{{ old('tambosAgua') }}"
                    class="form-control @error('tambosAgua') is-invalid @enderror"
                />
                @error('tambosAgua')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Tambos de agua --}}

            {{-- Consumo Energia --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="consumoEnergia">Consumo de energía o combustible usado $</label>
                <input type="number" 
                    name="consumoEnergia" id="consumoEnergia"
                    value="{{ old('consumoEnergia') }}"
                    class="form-control @error('consumoEnergia') is-invalid @enderror"
                />
                @error('consumoEnergia')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Consumo Energia --}}

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
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

        </div>{{-- Fin row del fromulario--}}

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Riego" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection