@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="col-12 text-center mb-5">Registro de Riego</h1>
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

            {{-- Tipo de riego --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="MetodoAplicacion">Metodo de Aplicación</label>
                <select name="MetodoAplicacion" id="MetodoAplicacion" class="form-control">
                    <option value="Aspersion">Aspersión</option>
                    <option value="Goteo">Goteo</option>
                    <option value="Riego">Riego</option>
                </select>
            </div>{{-- Fin tipo de riego --}}

            {{-- Fuente de Agua --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FuenteAgua">Fuente de Agua</label>
                <select name="FuenteAgua" id="FuenteAgua" class="form-control">
                    <option value="Rio">Rio</option>
                    <option value="Subterraneo">Subterraneo</option>
                    <option value="Olla">Olla</option>
                    <option value="Pipa">Pipa</option>
                </select>
            </div>{{-- Fin Fuente de agua --}}

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

            {{-- Hora Inicio--}}
            <div class="form-group col-sm-12 col-md-4 col-lg-3 mb-5">
                <label for="HoraInicio">Hora de inicio</label>
                <input type="time" name="HoraInicio"  id="HoraInicio" class="form-control">
            </div>{{-- Fin Hora Inicio--}}

            {{-- Hora Fin--}}
            <div class="form-group col-sm-12 col-md-4 col-lg-3 mb-5">
                <label for="HoraFin">Hora de Finalización</label>
                <input type="time" name="HoraFin"  id="HoraFin" class="form-control">
            </div>{{-- Fin Hora Fin--}}

            <div class="form-group col-12 col-md-4 col-lg-3">
                <label for="HoraTotal">
                    Tiempo total: 
                </label>
                <span class="h1">
                    00:00 hrs
                </span>
            </div>
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="MetrosCubicosAgua">Metros cúbicos de agua usados</label>
                <input type="number" name="MetrosCubicosAgua" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="ManzanasRegadas">Manzanas Regadas</label>
                <input type="number" name="ManzanasRegadas" id="ManzanasRegadas" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="ConsumoEnergia">Consumo de energía o combustible usado</label>
                <input type="number" name="ConsumoEnergia" id="ConsumoEnergia" class="form-control">
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

        </div>{{-- Fin row del fromulario--}}

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Riego" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection