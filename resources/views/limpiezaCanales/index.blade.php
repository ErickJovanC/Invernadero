@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Limpieza y Mantenimiento de Canales de Riego y Drenaje</h1>
    <form action="" method="post" class="col-12">
        <div class="row">
            
            {{-- Propiedad --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Propiedad">Propiedad</label>
                <div class="alert alert-warning">Esto vendra de las Propiedades registradas</div>
                <select name="Propiedad" id="Propiedad" class="form-control">
                    <option value="Propiedad1437">Propiedad 1437</option>
                    <option value="Propiedad2845">Propiedad 2845</option>
                    <option value="Propiedad4579">Propiedad 4579</option>
                </select>
            </div>{{-- Fin Propiedad --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-4 col-lg-3 mb-5">
                <label for="FechaAplicacion">Fecha de aplicación</label>
                <input type="date" 
                    name="FechaAplicacion" 
                    class="form-control" 
                    value="2021-07-04"
                    min="2021-03-01"
                />
            </div>{{-- Fin Fecha --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="NombreCanal">Nombre o número del canal o drenaje a limpiar</label>
                <input type="text" name="NombreCanal" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="LongitudCanal">Longitud de canal o drenaje limpiado o reparado</label>
                <input type="number" name="LongitudCanal" id="LongitudCanal" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Revestimiento">Tipo de revestimiento del canal o drenaje</label>
                <input type="text" name="Revestimiento" id="Revestimiento" class="form-control">
            </div>

            <div class="w-100"></div>

            <div class="col-12 text-center">
                <span class="h1">Acción</span>
            </div>

            <div class="form-group col-sm-12 col-md-4 mb-5">
                <label for="Reparacion">Reparación</label>
                <input type="text" name="Reparacion" id="Reparacion" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-4 mb-5">
                <label for="CorteVegetal">Corte de cobertura vegetal</label>
                <input type="text" name="CorteVegetal" id="CorteVegetal" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-4 mb-5">
                <label for="Desasolve">Desasolve</label>
                <input type="text" name="Desasolve" id="Desasolve" class="form-control">
            </div>

            <div class="w-100"></div>

            <div class="form-group col-sm-12 mb-5">
                <label for="Observacion">Observaciones</label>
                <textarea name="Observacion" id="Observacion" rows="4" class="form-control"></textarea>
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

        </div> {{-- Fin row del formulario --}}

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Mantenimiento" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection