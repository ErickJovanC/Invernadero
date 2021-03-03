@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Control Preventivo de Plagas Enfermades</h1>
            <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Lote">Lote</label>
                <div class="alert alert-warning">Esto vendra de los lotes registrados y que aun no han sido controlados</div>
                <select name="Lote" id="Lote" class="form-control">
                    <option value="1437">1437</option>
                    <option value="2845">2845</option>
                    <option value="4579">4579</option>
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="OrigenPlanta">Empresa o persona de donde viene la planta</label>
                <div class="alert alert-info">Este campo podria ser inncesario ya que el número de lote indica este dato.</div>
                <input type="text" name="OrigenPlanta" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <div class="alert alert-danger">Hacer lista selectiva</div>
                <label for="PlagaControlar">Plaga o Enfermadad a Controlar</label>
                <input type="text" name="ResistenciaPlagas" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaAccion">Fecha de Acción</label>
                <input type="date" name="FechaAccion" class="form-control" value="04-07-21">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="CantidadPlantas">Cantidad de Plantas tratadas</label>
                <input type="number" name="CantidadPlantas" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="VariedadPlanta">Variedad de la planta</label>
                <div class="alert alert-danger">La varidad es posible que sea mejor una lista selectiva, en este punto podria ser innecesario ya que se registro en el lote</div>
                <input type="text" name="VaridadPlanta" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="AccionPreventiva">Acciones de control preventivo</label>
                <div class="alert alert-danger">Posible Lista selectiva</div>
                <input type="text" name="AccionPreventiva" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="TiempoInmersion">Tiempo de Inmersión (minutos)</label>
                <input type="number" name="TiempoInmersion" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Temperatura">Temperatura (°C)</label>
                <input type="number" name="Temperatura" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Responsable">Responsable</label>
                <div class="alert alert-warning">Esto vendra de los empleados registrados</div>
                <select name="Responsable" id="Responsable" class="form-control">
                    <option value="Pedro">Pedro</option>
                    <option value="Juan">Juan</option>
                    <option value="Oscar">Oscar</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" value="Registrar Control Preventivo" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection