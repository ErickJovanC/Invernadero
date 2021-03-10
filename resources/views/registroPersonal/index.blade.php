@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro Personal</h1>
    <form action="" method="post" enctype="multipart/form-data" class="col-12">
        @csrf
        <div class="row">
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" class="form-control">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Apellidos">Apellidos</label>
                <input type="text" name="Apellidos" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Telefono">Teléfono</label>
                <input type="text" name="Telefono" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Direccion">Dirección</label>
                <input type="text" name="Direccion" class="form-control">
            </div>
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Foto">Foto</label>
                <input type="file" name="Foto" class="form-control">
            </div>
            <div class="w-100"></div>
        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Datos" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection