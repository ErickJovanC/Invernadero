@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Calidad de la Planta</h1>
            <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaCorte">Fecha de corte de la planta</label>
                <input type="date" name="FechaCorte" class="form-control" value="04-07-21">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="FechaRecepción">Fecha en que recibe la planta</label>
                <input type="date" name="FechaRecepción" class="form-control" value="04-07-21">
            </div>
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <div class="alert alert-info">Esto podria venir de un registro de proveedores</div>
                <label for="OrigenPlanta">Empresa o persona de donde viene la planta</label>
                <input type="text" name="OrigenPlanta" class="form-control">
            </div>
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="CantidadPlantas">Cantidad de plantas</label>
                <input type="number" name="CantidadPlantas" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="VariedadPlanta">Variedad de la planta</label>
                <div class="alert alert-danger">La varidad es posible que sea mejor una lista selectiva</div>
                <input type="text" name="VaridadPlanta" class="form-control">
            </div>
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Yemas">Yemas efectivas %</label>
                <input type="number" name="Yemas" class="form-control col-11">
                <span class="col-1">%</span>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Lote">No. de Lote</label>
                <input type="text" name="Lote" class="form-control">
            </div>

            <div class="alert alert-danger">Estas opciones podrian ser selectivas
                <div class="form-group col-sm-12 col-md-6 mb-5">
                    <label for="ResistenciaPlagas">Plagas o enfermedades a las cuales es resistente</label>
                    <input type="text" name="ResistenciaPlagas" class="form-control">
                </div>

                <div class="form-group col-sm-12 col-md-6 mb-5">
                    <label for="ToleranciaPlagas">Plagas o enfermedades a las cuales es tolerante</label>
                    <input type="text" name="ToleranciaPlagas" class="form-control">
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Certificado">No. de Certificado de la planta</label>
                <input type="text" name="Certificado" class="form-control">
            </div>
        </div>
        <div class="row mb-5">
            <div class="form-group col">
                <input type="submit" value="Registrar Calidad de la Planta" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection