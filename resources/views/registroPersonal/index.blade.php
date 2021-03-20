@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro Personal</h1>
    <form action="{{ route('registroPersonal.store') }}" method="post" enctype="multipart/form-data" class="col-12">
        @csrf
        <div class="row">
            
            <div class="form-group col-sm-12 col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                    class="form-control @error('nombre') is-invalid @enderror"
                    value="{{ old('nombre') }}"
                >
                @error('nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <label for="apellidoPaterno">Apellido Paterno</label>
                <input type="text" name="apellidoPaterno" id="apellidoPaterno" 
                    class="form-control @error('apellidoPaterno') is-invalid @enderror"
                    value="{{ old('apellidoPaterno') }}"
                >
                @error('apellidoPaterno')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="apellidoMaterno">Apellido Materno</label>
                <input type="text" name="apellidoMaterno" id="apellidoMaterno" 
                    class="form-control @error('apellidoMaterno') is-invalid @enderror"
                    value="{{ old('apellidoMaterno') }}"
                >
                @error('apellidoMaterno')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="telefono">Teléfono</label>
                <input type="number" name="telefono" 
                    class="form-control @error('telefono') is-invalid @enderror"
                    value="{{ old('telefono') }}"
                >
                @error('telefono')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion"     
                    class="form-control @error('direccion') is-invalid @enderror"
                    value="{{ old('direccion') }}"
                >
                @error('direccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
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