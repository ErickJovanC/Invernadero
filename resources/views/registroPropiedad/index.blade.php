@extends('layouts.app')
@section('content')
<form action="" method="post">
    @csrf
    <div class="form-group">
        <label for="NombrePropiedad">Nombre propiedad</label>
        <input type="text" name="NombrePropiedad" class="form-control">
    </div>
    <div class="form-group">
        <label for="Propietario">Propietario</label>
        <input type="text" name="Propietario" class="form-control">
    </div>
    <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" class="form-control">
    </div>
    <div class="form-group">
        <label for="Municipio">Municipio</label>
        <input type="text" name="Municipio" class="form-control">
    </div>
    <div class="form-group">
        <label for="Colonia">Colonia</label>
        <input type="text" name="Colonia" class="form-control">
    </div>
    <div class="form-group">
        <label for="Cultivo1">Cultivo1</label>
        <input type="text" name="Cultivo1" class="form-control">
    </div>
    <div class="form-group">
        <label for="Extension">Extensión (Manzanas)</label>
        <input type="text" name="Extension" class="form-control">
    </div>
    <div class="form-group">
        <label for="Ubicacion">Ubicación</label>
        <input type="text" name="Ubicacion" class="form-control">
    </div>
    <div class="form-group">
        <input type="button" value="Registrar Propiedad">
    </div>
</form>
@endsection