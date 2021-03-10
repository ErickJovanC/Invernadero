@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Fertilizante Oranico</h1>
    <form action="" method="post" class="col-12">
        @csrf
        <div class="row">

            {{-- Lote --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Lote">Lote</label>
                <div class="alert alert-warning">Esto vendra de los lotes registrados</div>
                <select name="Lote" id="Lote" class="form-control">
                    <option value="1437">1437</option>
                    <option value="2845">2845</option>
                    <option value="4579">4579</option>
                </select>
            </div>{{-- Fin Lote --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaAplicacion">Fecha de aplicación</label>
                <input type="date" 
                    name="FechaAplicacion" 
                    class="form-control" 
                    value="2021-07-04"
                    min="2021-03-01"
                />
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="TipoSubproducto">Tipo desubproducto o abono orgánico</label>
                <input type="text" name="TipoSubproducto" class="form-control">
            </div>

            <div class="form-group col-6 col-md-4 mb-5">
                <label for="CantidadAplicadaToneladas">Cantidad aplicada (qq o tonelada</label>
                <input type="text" name="CantidadAplicadaToneladas" class="form-control">
            </div>

            <div class="col-sm12 col-md6 text-center">
                Aporte Nutrientes %
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
                <label for="CantidadAplicada">Cantidad Aplicada</label>
                <input type="text" name="CantidadAplicada" class="form-control">
            </div>

            <div class="form-group col-6 col-md-4 mb-5">
                <label for="Superficie">Superficie</label>
                <input type="text" name="Superficie" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="MetodoAplicacion">Metodo de Aplicación</label>
                <select name="MetodoAplicacion" id="MetodoAplicacion" class="form-control">
                    <option value="Aspersion">Aspersión</option>
                    <option value="Goteo">Goteo</option>
                    <option value="Riego">Riego</option>
                </select>
            </div>

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Responsable">Responsable</label>
                <div class="alert alert-warning">Esto vendra de los empleados registrados</div>
                <select name="Responsable" id="Responsable" class="form-control">
                    <option value="Pedro">Pedro Pérez (Güero)</option>
                    <option value="Juan">Juan</option>
                    <option value="Oscar">Oscar</option>
                </select>
            </div>{{-- Fin Responsable --}}

        </div> {{-- Fin Row --}}

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Fertilizante Organico" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection