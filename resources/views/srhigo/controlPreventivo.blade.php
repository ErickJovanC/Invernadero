@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Control Preventivo de Plagas Enfermades</h1>
            
            {{-- <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div> --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="lotePlanta">No. de Lote de la Planta a tratar</label>
                <select name="lotePlanta" id="lotePlanta" class="form-control">
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
            </div>

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
                    class="form-control"
                    value="{{ old('plagaControlar') }}"
                />
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaAccion">Fecha de Acción</label>
                <input type="date" 
                    name="fechaAccion" 
                    id="fechaAccion"
                    class="form-control" 
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaAccion') }}"
                />
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="cantidadPlantas">Cantidad de Plantas tratadas</label>
                <input type="number" 
                    name="cantidadPlantas" 
                    id="cantidadPlantas"
                    vvalue="{{ old('cantidadPlantas') }}"
                    class="form-control"
                />
            </div>

            {{-- Es posible que sea innecesario, lo ideal es que se registre un lote por cada variedad de planta aunque lleguen juntos
                <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="VariedadPlanta">Variedad de la planta</label>
                <div class="alert alert-danger">La varidad es posible que sea mejor una lista selectiva, en este punto podria ser innecesario ya que se registro en el lote</div>
                <input type="text" name="VaridadPlanta" class="form-control">
            </div> --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="AccionPreventiva">Acciones de control preventivo</label>
                <input type="text" name="AccionPreventiva" class="form-control">
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
                <label for="Responsable">Responsable</label>
                <select name="Responsable" id="Responsable" class="form-control">
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