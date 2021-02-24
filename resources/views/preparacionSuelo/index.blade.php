@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="NombrePropietario">Nombre Propietario: </label>
        Juan Pérez
    </div>
    <div class="form-group">
        <label for="Nombre de la propiedad">Nombre de la propiedad: </label>
        Propiedad de prueba
    </div>

    <div class="form-group">
        <label for="Labor"></label>
        <select name="Labor" id="Labor" class="form-control">
            <option value="Rastra">Rastra</option>
            <option value="Arado">Arado</option>
            <option value="Subsuelo">Subsuelo</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="Manzana"></label>
        <select name="Manzana" id="Manzana" class="form-control">
            <option value="Manzana 1">Manzana 1</option>
            <option value="Manzana 2">Manzana 2</option>
            <option value="Manzana 3">Manzana 3</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="FechaInicio">Fecha Inicial</label>
        <input type="date" name="FechaInicio" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="FechaFin">Fecha Finalización</label>
        <input type="date" name="FechaFin" class="form-control">
    </div>

    <div class="form-group">
        <label for="HorasMaquinaria">Horas de Maquinaria</label>
        <input type="text" name="HorasMaquinaria" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="MaquinariaUtilizada">Maquinaria o equipo Utilizado</label>
        <input type="text" name="MaquinariaUtilizada" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="Responsable">Responsable</label>
        <input type="text" name="Responsable" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" value="Registrar Preparacion de Suelo">
    </div>
</form>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection