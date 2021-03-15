@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro Personal</h1>
    <form action="{{ route('registroPersonal.store') }}" method="post" enctype="multipart/form-data" class="col-12">
        @csrf
        <div class="row">
            
            <div class="form-group col-sm-12 col-md-6">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" 
                    class="form-control @error('Nombre') is-invalid @enderror"
                    value="{{ old('Nombre') }}"
                >
                @error('Nombre')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6">
                <label for="ApellidoPaterno">Apellido Paterno</label>
                <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" 
                    class="form-control @error('ApellidoPaterno') is-invalid @enderror"
                    value="{{ old('ApellidoPaterno') }}"
                >
                @error('ApellidoPaterno')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="ApellidoMaterno">Apellido Materno</label>
                <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" 
                    class="form-control @error('ApellidoMaterno') is-invalid @enderror"
                    value="{{ old('ApellidoMaterno') }}"
                >
                @error('ApellidoMaterno')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Telefono">Teléfono</label>
                <input type="number" name="Telefono" 
                    class="form-control @error('Telefono') is-invalid @enderror"
                    value="{{ old('Telefono') }}"
                >
                @error('Telefono')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Direccion">Dirección</label>
                <input type="text" name="Direccion"     
                    class="form-control @error('Direccion') is-invalid @enderror"
                    value="{{ old('Direccion') }}"
                >
                @error('Direccion')
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