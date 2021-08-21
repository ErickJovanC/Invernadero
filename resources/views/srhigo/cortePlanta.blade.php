@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulos mb-5 col-12 text-center">Control de Podas</h1>
    <form action="{{ route('cortePlanta.store') }}" method="post" class="col-12">
        @csrf
        <div class="row align-items-end">
            @include('srhigo.campos.fecha')
            @include('srhigo.campos.huertaSeccion')

            {{-- Plantas cortadas --}}
            <div class="form-group col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3 mb-5">
                <label for="cantidad">Cantidad de Plantas</label>
                <input type="number" min="1" name="cantidad" id="cantidad" 
                    value="{{ old('cantidad') }}" 
                    class="form-control @error('cantidad') is-invalid @enderror">
                @error('cantidad')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Plantas cortadas --}}

            {{-- Motivo --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="motivo">Motivo de la poda</label>
                <select name="motivo" id="motivo" class="form-control @error('motivo') is-invalid @enderror">
                    <option value="" hidden>Seleccionar...</option>
                    <option 
                        value="Formación" 
                        {{ old('motivo') == 'Formación' ? 'selected' : '' }}
                    >
                        Formación
                    </option>
                    <option 
                        value="Aclareo" 
                        {{ old('motivo') == 'Aclareo' ? 'selected' : '' }}
                    >
                        Aclareo
                    </option>
                    <option 
                        value="Mantenimiento" 
                        {{ old('motivo') == 'Mantenimiento' ? 'selected' : '' }}
                    >
                        Mantenimiento
                    </option>
                    <option 
                        value="Producción" 
                        {{ old('motivo') == 'Producción' ? 'selected' : '' }}
                    >
                        Producción
                    </option>
                    <option 
                        value="Eliminación" 
                        {{ old('motivo') == 'Eliminación' ? 'selected' : '' }}
                    >
                        Eliminación
                    </option>
                </select>
                @error('motivo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Motivo --}}

            {{-- Comentario --}}
            <div class="form-group col-12 col-lg-8 mb-5">
                <label for="comentario">Comentario</label>
                <input type="text" name="comentario" id="comentario" 
                    value="{{ old('comentario') }}" 
                    class="form-control @error('comentario') is-invalid @enderror">
                @error('comentario')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            {{-- Fin Comentario --}}

            {{-- Costo --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-5">
                <label for="costo">Costo</label>
                <input type="number" 
                    name="costo" 
                    id="costo"
                    min="0"
                    step="0.5"
                    max="99999.5"
                    value="{{ old('costo') ?  old('costo') : 0 }}"
                    class="form-control 
                        @error('costo') is-invalid @enderror" 
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Costo --}}

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-6 mb-5">
                <label for="responsable">Responsable</label>
                <select name="responsable" id="responsable" class="form-control @error('responsable') is-invalid @enderror">
                    <option value="" hidden>Seleccione el empleado</option>
                    @foreach ($empleados as $empleado)
                        <option 
                            value="{{ $empleado->id }}" 
                            {{ old('responsable') == $empleado->id ? 'selected' : '' }}
                        >
                            {{ $empleado->nombreEmpleado ." ".
                                $empleado->apellidoEmpleado ." (".
                                $empleado->sobrenombreEmpleado .")"}}
                        </option>
                    @endforeach
                </select>
                @error('responsable')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Responsable --}}

        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Corte de Plantas" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
@endsection