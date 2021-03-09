@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Fertilizante</h1>
    <form action="" method="post" class="col-12">
        @csrf
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaAplicacion">Fecha de aplicación</label>
                <input type="date" name="FechaAplicacion" class="form-control" value="04-07-21">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="NombreFertilizante">Nombre Comercial del Fertilizante</label>
                <input type="text" name="NombreFertilizante" class="form-control">
            </div>
            <div class="col-sm12 col-md6 text-center">
                Contenido Nutrintes Fertilizantes
            </div>
        </div>
        <div class="row">
            <div class="form-group col-2 mb-5">
                <label for="N">N</label>
                <input type="text" name="N" class="form-control">
            </div>
            <div class="form-group col-2 mb-5">
                <label for="P2O5">P<sub>2</sub>O<sub>5</sub></label>
                <input type="text" name="P2O5" class="form-control">
            </div>
            <div class="form-group col-2 mb-5">
                <label for="K2O">K<sub>2</sub>O</label>
                <input type="text" name="K2O" class="form-control">
            </div>
            <div class="form-group col-2 mb-5">
                <label for="Ca">Ca</label>
                <input type="text" name="Ca" class="form-control">
            </div>
            <div class="form-group col-2 mb-5">
                <label for="Mg">Mg</label>
                <input type="text" name="Mg" class="form-control">
            </div>
            <div class="form-group col-2 mb-5">
                <label for="S">S</label>
                <input type="text" name="S" class="form-control">
            </div>
            <div class="form-group col-6 col-md-4 mb-5">
                <label for="Micronutrientes">Micronutrientes</label>
                <input type="text" name="Micronutrientes" class="form-control">
            </div>
            <div class="form-group col-6 col-md-4 mb-5">
                <label for="KilosHectare">Kilos por hectarea</label>
                <input type="text" name="KilosHectare" class="form-control">
            </div>

            <div class="w-100"></div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="MetodoAplicacion">Metodo de Aplicación</label>
                <select name="MetodoAplicacion" id="MetodoAplicacion" class="form-control">
                    <option value="Aspersion">Aspersión</option>
                    <option value="Goteo">Goteo</option>
                    <option value="Riego">Riego</option>
                </select>
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

        </div> {{-- Fin Row --}}

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Fertilizante" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection