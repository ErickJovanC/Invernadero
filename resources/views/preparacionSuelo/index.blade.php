@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
<h1 class="titulo mb-5 col-12 text-center">Preparación de Suelo</h1>
    <form action="" method="post" class="mt-4">
        @csrf
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div>
        </div>
        <div class="row">
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Propiedad">Propiedad</label>
                <select name="Propiedad" id="Propiedad" class="form-control">
                    <option value="Propiedad 1">Propiedad 1</option>
                    <option value="Propiedad 2">Propiedad 2</option>
                    <option value="Propiedad 3">Propiedad 3</option>
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Manzana">Manzana</label>
                <select name="Manzana" id="Manzana" class="form-control">
                    <option value="Manzana 1">Manzana 1</option>
                    <option value="Manzana 2">Manzana 2</option>
                    <option value="Manzana 3">Manzana 3</option>
                </select>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Labor">Labor</label>
                <select name="Labor" id="Labor" class="form-control">
                    <option value="Rastra">Rastra</option>
                    <option value="Arado">Arado</option>
                    <option value="Subsuelo">Subsuelo</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaInicio">Fecha Inicial</label>
                <input type="date" name="FechaInicio" class="form-control" value="04-07-21">
            </div>
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaFin">Fecha Finalización</label>
                <input type="date" name="FechaFin" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="HorasMaquinaria">Horas de Maquinaria</label>
                <input type="text" name="HorasMaquinaria" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Jornales">No. de Jornales</label>
                <input type="text" name="Jornales" class="form-control">
            </div>
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="MaquinariaUtilizada">Maquinaria o equipo Utilizado</label>
                <input type="text" name="MaquinariaUtilizada" class="form-control">
            </div>
            
            {{-- El responsable deberá ser un elemento extraido de la BD
                Son los empleados del propietario. --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Responsable">Responsable</label>
                <input type="text" name="Responsable" class="form-control">
            </div>
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