@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
<h1 class="titulo mb-5 col-12 text-center">Preparación de Suelo</h1>
    <form action="{{ route('preparacionSuelo.store') }}" method="post" class="mt-4">
        @csrf
        {{-- <div class="row">
            <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div>
        </div> --}}
        <div class="row">
            
            {{-- Propiedad --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="propiedad">Huerta</label>
                <select name="propiedad" id="propiedad" 
                    class="form-control @error('propiedad') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione la huerta</option>
                    @foreach ($huertas as $huerta)
                        <option 
                            value="{{ $huerta->id }}" 
                            {{ old('propiedad') == $huerta->id ? 'selected' : '' }}
                        >
                            {{ $huerta->nombreHuerta }}
                        </option>
                    @endforeach
                </select>
                @error('propiedad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Propiedad --}}

            {{-- Sección --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="seccion">Sección</label>
                <select name="seccion" id="seccion" 
                    class="form-control @error('seccion') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione la sección</option>
                    @foreach ($secciones as $seccion)
                        <option 
                            value="{{ $seccion->id }}" 
                            {{ old('seccion') == $seccion->id ? 'selected' : '' }}
                        >
                            {{ $seccion->nombreSeccion }}
                        </option>
                    @endforeach
                </select>
                @error('seccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Sección --}}

            {{-- Labor --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="labor">Labor Realizada</label>
                <select name="labor" id="labor" class="form-control @error('labor') is-invalid @enderror">
                    <option value="" hidden>Seleecione la labor realizada</option>
                    <option value="Subsolado"
                        {{ old('labor') == 'Subsolado' ? 'selected' : '' }}
                    />
                        Subsolado
                    </option>
                    <option value="Surcado" 
                        {{ old('labor') == 'Surcado' ? 'selected' : '' }}
                    />
                        Surcado
                    </option>
                </select>
                @error('labor')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin labor --}}

            <div class="w-100"></div>

            {{-- Fecha Inicial --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaInicio">Fecha Inicial</label>
                <input type="date"
                    name="fechaInicio" id="fechaInicio" 
                    class="form-control @error('fechaInicio') is-invalid @enderror" 
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaInicio') }}"
                />
                @error('fechaInicio')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha Inicial --}}

            {{-- Fecha Final --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaFin">Fecha de finalización</label>
                <input type="date"
                    name="fechaFin" id="fechaFin" 
                    class="form-control @error('fechaFin') is-invalid @enderror" 
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaFin') }}"
                />
                @error('fechaFin')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha Final --}}

            {{-- Horas Maquinaria --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="horasMaquinaria">Horas de Maquinaria</label>
                <input type="number" 
                    name="horasMaquinaria" 
                    id="horasMaquinaria" 
                    class="form-control @error('horasMaquinaria') is-invalid @enderror"
                    value="{{ old('horasMaquinaria') }}"
                />
                @error('horasMaquinaria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Horas Mquinaria --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="">Costo por hora</label>
                <input type="number" 
                    name="costoHora" 
                    id="costoHora" 
                    class="form-control @error('costoHora') is-invalid @enderror"
                    value="{{ old('costoHora') }}"
                />
                @error('costoHora')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            
            {{-- Metodo --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="metodoUtilizado">Metodo o Equipo Utilizado</label>
                <select name="metodoUtilizado" id="metodoUtilizado" class="form-control">
                    <option value="" hidden>Seleecione una opción</option>
                    <option value="Yunta" 
                        {{ old('metodoUtilizado') == 'Yunta' ? 'selected' : '' }}>
                        Yunta
                    </option>
                    <option value="Tractor"
                        {{ old('metodoUtilizado') == 'Tractor' ? 'selected' : '' }}>
                        Tractor
                    </option>
                    <option value="Manual"
                    {{ old('metodoUtilizado') == 'Manual' ? 'selected' : '' }}>
                        Manual
                    </option>
                    <option value="Otro" 
                        {{ old('metodoUtilizado') == 'Otro' ? 'selected' : '' }}>
                        Otro
                    </option>
                </select>
            </div>{{-- Fin Metodo --}}
            
            {{-- Empleados --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="empleado">Responsable (trabajador)</label>
                <select name="empleado" id="empleado" 
                    class="form-control @error('empleado') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione al responsable</option>
                    @foreach ($empleados as $empleado)
                        <option 
                            value="{{ $empleado->id }}" 
                            {{ old('empleado') == $empleado->id ? 'selected' : '' }}
                        >
                            {{ $empleado->nombreEmpleado .' '.
                                $empleado->apellidoEmpleado .' ('. 
                                $empleado->sobrenombreEmpleado .')' 
                            }}
                        </option>
                    @endforeach
                </select>
                @error('empleado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Empleados --}}

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Preparacion de Suelo" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection