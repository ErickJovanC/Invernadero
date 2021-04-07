@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="{{ route('controlPreventivo.store') }}" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Control Preventivo de Plagas Enfermades</h1>
            
            {{-- <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div> --}}

            {{-- Lote de plantas --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="lotePlanta">No. de Lote de la Planta a tratar</label>
                <select name="lotePlanta" id="lotePlanta" class="form-control @error('lotePlanta') is-invalid @enderror">
                    <option value="" hidden>Seleccione el Lote de la planta</option>
                    @foreach ($lotes as $lote)
                        <option 
                            value="{{ $lote->id }}"
                            {{ old('lotePlanta') == $lote->id ? 'selected' : '' }} >
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

            {{-- <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="OrigenPlanta">Empresa o persona de donde viene la planta</label>
                <div class="alert alert-info">Este campo podria ser inncesario ya que el número de lote indica este dato.</div>
                <input type="text" name="OrigenPlanta" class="form-control">
            </div> --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <div class="alert alert-danger">Hacer lista selectiva</div>
                <label for="plagaControlar">Plaga o Enfermadad a Controlar</label>
                <input type="text" 
                    name="plagaControlar" 
                    id="plagaControlar" 
                    value="{{ old('plagaControlar') }}"
                    class="form-control 
                        @error('plagaControlar') is-invalid @enderror"
                />
                @error('plagaControlar')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaAccion">Fecha de Acción</label>
                <input type="date" 
                    name="fechaAccion" 
                    id="fechaAccion"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaAccion') }}"
                    class="form-control 
                        @error('fechaAccion') is-invalid @enderror"
                />
                @error('fechaAccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="cantidadPlantas">Cantidad de Plantas tratadas</label>
                <input type="number" 
                    name="cantidadPlantas" 
                    id="cantidadPlantas"
                    value="{{ old('cantidadPlantas') }}"
                    class="form-control 
                        @error('cantidadPlantas') is-invalid @enderror"
                />
                @error('cantidadPlantas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            {{-- Es posible que sea innecesario, lo ideal es que se registre un lote por cada variedad de planta aunque lleguen juntos
                <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="VariedadPlanta">Variedad de la planta</label>
                <div class="alert alert-danger">La varidad es posible que sea mejor una lista selectiva, en este punto podria ser innecesario ya que se registro en el lote</div>
                <input type="text" name="VaridadPlanta" class="form-control">
            </div> --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="accionPreventiva">Acciones de control preventivo</label>
                <input type="text" 
                    name="accionPreventiva" 
                    id="accionPreventiva" 
                    value="{{ old('accionPreventiva') }}"
                    class="form-control 
                        @error('accionPreventiva') is-invalid @enderror"
                />
                @error('accionPreventiva')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="TiempoInmersion">Tiempo de Inmersión (minutos)</label>
                <input type="number" name="TiempoInmersion" class="form-control">
            </div> --}}

            {{-- <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Temperatura">Temperatura (°C)</label>
                <input type="number" name="Temperatura" class="form-control">
            </div> --}}
            
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

        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Control Preventivo" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection