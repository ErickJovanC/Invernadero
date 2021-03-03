@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row mt-4">
    <h1 class="titulo mb-5 col-12 text-center">Registro de propiedad</h1>
    <form action="" method="post" class="col-12">
    @csrf
        <div class="row">
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="NombrePropiedad">Nombre propiedad</label>
                <input type="text" name="NombrePropiedad" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="CodigoRegistro">Código de registro</label>
                <input type="text" name="CodigoRegistro" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Estado">Estado</label>
                <input type="text" name="Estado" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Municipio">Municipio</label>
                <input type="text" name="Municipio" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Colonia">Colonia</label>
                <input type="text" name="Colonia" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Calle">Calle y Número</label>
                <input type="text" name="Calle" class="form-control">
            </div>
            <div class="form-group  col-sm-12 col-md-6 mb-5">
                <label for="Cultivo1">Cultivo1</label>
                <input type="text" name="Cultivo1" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension">Extensión (m2)</label>
                <input type="text" name="Extension" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Cultivo2">Cultivo2</label>
                <input type="text" name="Cultivo2" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension2">Extensión 2 (m2)</label>
                <input type="text" name="Extension2" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Cultivo3">Cultivo3</label>
                <input type="text" name="Cultivo3" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension3">Extensión 3 (m2)</label>
                <input type="text" name="Extension3" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Cultivo4">Cultivo4</label>
                <input type="text" name="Cultivo4" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Extension4">Extensión 4 (m2)</label>
                <input type="text" name="Extension4" class="form-control">
            </div>
            <div class="form-group col-12">
                <label for="Ubicacion">Ubicación</label>
                <input type="text" name="Ubicacion" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Registrar Propiedad">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection