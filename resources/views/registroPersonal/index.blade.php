@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" class="form-control">
    </div>
    <div class="form-group">
        <label for="Apellidos">Apellidos</label>
        <input type="text" name="Apellidos" class="form-control">
    </div>
    <div class="form-group">
        <label for="Telefono">Teléfono</label>
        <input type="text" name="Telefono" class="form-control">
    </div>
    <div class="form-group">
        <label for="Direccion">Dirección</label>
        <input type="text" name="Direccion" class="form-control">
    </div>
    <div class="form-group">
        <label for="Foto">Foto</label>
        <input type="file" name="Foto" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="Registrar Propiedad">
    </div>
</form>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection