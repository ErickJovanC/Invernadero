@extends('layouts.app')
@section('content')
{{-- <a href="{{ route('main') }}" class="btn btn-success">Menú</a> --}}
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Registro de Secciones</h1>
    
    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center">
            {!! Session::get('mensaje') !!}
        </div>
    @endif

    {{-- Formulario principal --}}
    <form action="{{ route('seccion.store') }}" method="post" class="col-12">
    @csrf
        <div class="row">
            {{-- Propiedad --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="propiedad">Huerta</label>
                <select name="propiedad" id="propiedad" 
                    class="form-control @error('propiedad') is-invalid @enderror"
                >
                    <option value="" hidden>Seleccione la huerta</option>
                    @foreach ($huertas as $huerta)
                        <option 
                            value="{{ $huerta->id }}" 
                            {{ old('propiedad') == $huerta->id ? 'selected' : '' }}
                        >
                            {{ $huerta->nombreHuerta }}
                        </option>
                    @endforeach
                </select>
                @error('propiedad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Propiedad --}}

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="nombreSeccion">Nombre o número de Sección</label>
                <input type="text" 
                    name="nombreSeccion" id="nombreSeccion" 
                    class="form-control @error('nombreSeccion') is-invalid @enderror" 
                    value="{{ old('nombreSeccion') }}"
                />
                @error('nombreSeccion')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="cantidadPlantas">
                    ¿Cuantas plantas tiene en esta sección?
                </label>
                <input type="number" 
                    name="cantidadPlantas" 
                    id="cantidadPlantas" 
                    min="0"
                    value="{{ old('cantidadPlantas') ? old('cantidadPlantas') : 0}}"
                    class="form-control @error('cantidadPlantas') is-invalid @enderror" 
                />
                @error('cantidadPlantas')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                @enderror
            </div>
        </div>

        {{-- Botón del formulario --}}
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Sección" class="btn btn-primary px-5">
            </div>
        </div> {{-- Fin Botón del formulario --}}
    </form>
</div>

{{-- Tabla de registros --}}
<div class="row">
    <div class="col">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Huerta</th>
                    <th scope="col">Nombre Sección</th>
                    <th scope="col">Plantas</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($secciones as $seccion)
                <tr>
                    <th scope="row">{{ $seccion->propiedad->nombreHuerta }}</th>
                    <td>{{ $seccion->nombreSeccion }}</td>
                    <td>{{ $seccion->cantidadPlantas }}</td>
                    <td><a href="{{ route('seccion.edit', $seccion) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <a href="{{ route('main') }}" class="btn btn-success ">Menú Principal</a>
    <a href="{{ route('registroPropiedad.create') }}" class="btn btn-success ml-3">Registrar Huerta</a>
    <a href="{{ route('empleado.create') }}" class="btn btn-success ml-3">Registrar Empleados</a>
</div>
{{-- Fin tabla de contenido --}}
@endsection