@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Calibración de Equipo de Aplicación</h1>
    <form action="" method="post" class="col-12 mb-5">
        @csrf
        <div class="row">

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>No de Repetición</span>
                <br>
                <span class="h1">#1</span>
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="VolumenPesoInicial">Volumen o Peso Inicial (Kilogramos o Litros A)</label>
                <input type="text" name="VolumenPesoInicial" class="form-control">
            </div>
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="VolumenPesoFinal">Volumen o Peso Final (Kilogramos o Litros B)</label>
                <input type="text" name="VolumenPesoFinal" class="form-control">
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>Gasto del Equipo (A-B) = C</span>
                <br>
                <span class="h1">0.0</span>
            </div>

            <div class="w-100"></div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="LongitudRecorrida">Longitud Recorrida (metros D)</label>
                <input type="text" name="LongitudRecorrida" class="form-control">
            </div>
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="AnchoCubierto">Ancho Cubierto (Metros E)</label>
                <input type="text" name="AnchoCubierto" class="form-control">
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>Área cubierta (m<sup>2</sup>) DxE = F</span>
                <br>
                <span class="h1">0.0</span>
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>Gasto por Manzana (7000 x C) / F</span>
                <br>
                <span class="h1">0.0</span>
            </div>

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Responsable">Responsable</label>
                <div class="alert alert-warning">Esto vendra de los empleados registrados</div>
                <select name="Responsable" id="Responsable" class="form-control">
                    <option value="Pedro">Pedro</option>
                    <option value="Juan">Juan</option>
                    <option value="Oscar">Oscar</option>
                </select>
            </div> {{-- Fin Responsable --}}
        </div> {{-- Fin row --}}
        
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Calibración de Equipo" class="btn btn-primary px-5">
            </div>
        </div>

    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection