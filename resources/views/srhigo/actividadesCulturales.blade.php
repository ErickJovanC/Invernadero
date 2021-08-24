@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Actividades Culturales</h1>
    <form action="{{ route('actividadesCulturales.store') }}" method="post" class="col-12">
        @csrf
        {{-- Huerta y Sección --}}
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 col-lg-5 mb-5">
                <label for="huertaSeccion">Huerta y Sección</label>
                <select name="huertaSeccion" id="huertaSeccion" class="form-control @error('huertaSeccion') is-invalid @enderror">
                    <option value="" hidden>Seleccione la huerta y sección</option>
                    @foreach ($secciones as $seccion)
                        <option
                            value="{{ $seccion->id }}"
                            {{ old('huertaSeccion') == $seccion->id ? 'selected' : '' }}
                        />
                        {{ $seccion->propiedad->nombreHuerta .' - '. $seccion->nombreSeccion}}
                        </option>
                    @endforeach
                </select>
                @error('huertaSeccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Huerta y sección --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-3 mb-5">
                <label for="fecha">Fecha</label>
                <input type="date"
                    name="fecha"
                    id="fecha"
                    max="{{ $fechaActual }}"
                    value="{{ old('fecha') }}"
                    class="form-control
                        @error('fecha') is-invalid @enderror"
                />
                @error('fecha')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Actividad Realizada --}}
            <div class="form-group col-sm-8 col-md-6 col-lg-4 mb-5">
                <label for="actividad">Actividad Realizada</label>
                <select name="actividad" id="actividad" class="form-control @error('actividad') is-invalid @enderror">
                    <option value="" hidden>Seleecionar...</option>
                    <option value="Control de Maleza"
                        {{ old('actividad') == 'Control de Maleza' ? 'selected' : '' }}
                    />
                        Control de Maleza
                    </option>
                    <option value="Eliminación de Llemas Axilares" 
                        {{ old('actividad') == 'Eliminación de Llemas Axilares' ? 'selected' : '' }}
                    />
                        Eliminación de Llemas Axilares
                    </option>
                    <option value="Pinchado para Crecimiento" 
                        {{ old('actividad') == 'Pinchado para Crecimiento' ? 'selected' : '' }}
                    />
                        Pinchado para Crecimiento
                    </option>
                </select>
                @error('actividad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Actividad Realizada --}}

            {{-- Costo --}}
            <div class="form-group col-sm-4 col-md-6 col-lg-2 mb-5">
                <label for="costo">Costo</label>
                <input type="number"
                    min="0"
                    step="0.5"
                    max="99999.5"
                    name="costo" 
                    id="costo" 
                    value="{{ old('costo') }}"
                    class="form-control @error('costo') is-invalid @enderror"
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Costo --}}

            {{-- Comentario --}}
            <div class="form-group col-sm-12 col-md-12 col-lg-10 mb-5">
                <label for="comentario">Comentario</label>
                <input type="text"
                    min="0"
                    name="comentario" 
                    id="comentario" 
                    value="{{ old('comentario') }}"
                    class="form-control @error('comentario') is-invalid @enderror"
                />
                @error('comentario')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Comentario --}}

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-12 col-lg-12 mb-5">
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
                <input type="submit" value="Registrar Actividad" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection