@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Aplicación de Fertilizante Oranico</h1>
    <form action="{{ route('aplicacionFertilizanteOrganico.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">

            {{-- Seccion --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="seccion">Seccion a Fertilizar</label>
                <select name="seccion" id="seccion" class="form-control @error('seccion') is-invalid @enderror">
                    <option value="" hidden>Seleccione la seccion a fertilizar</option>
                    @foreach ($secciones as $seccion)
                        <option 
                            value="{{ $seccion->id }}"
                            {{ old('seccion') == $seccion->id ? 'selected' : '' }}
                        />
                        {{ $seccion->nombreSeccion }}
                        </option>
                    @endforeach
                </select>
                @error('seccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Seccion --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaAplicacion">Fecha de Aplicación</label>
                <input type="date" 
                    name="fechaAplicacion" 
                    id="fechaAplicacion"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaAplicacion') }}"
                    class="form-control 
                        @error('fechaAplicacion') is-invalid @enderror" 
                />
                @error('fechaAplicacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Cantidad Aplicada --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="cantidadAplicada">Cantidad Aplicada KG</label>
                <input type="number" 
                    name="cantidadAplicada" 
                    id="cantidadAplicada" 
                    value="{{ old('cantidadAplicada') }}"
                    class="form-control @error('cantidadAplicada') is-invalid @enderror"
                />
                @error('cantidadAplicada')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Cantidad Aplicada --}}

            {{-- Superficie --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="superficie">Superficie</label>
                <input type="text" 
                    name="superficie" 
                    id="superficie" 
                    value="{{ old('superficie') }}"
                    class="form-control @error('superficie') is-invalid @enderror"
                />
                @error('superficie')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Superficie --}}

            {{-- Tipo de fertilizante --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="tipoFertilizante">Tipo de fertilizante</label>
                <select name="tipoFertilizante" id="tipoFertilizante" class="form-control @error('tipoFertilizante') is-invalid @enderror">
                    <option value="" hidden>Seleccione el tipo de abono</option>
                    <option value="Ave" 
                        {{ old('tipoFertilizante') == 'Ave' ? 'selected' : '' }}>
                        Ave
                    </option>
                    <option value="Bobino" 
                        {{ old('tipoFertilizante') == 'Bobino' ? 'selected' : '' }}>
                        Bobino</option>
                    <option value="Porcino" 
                        {{ old('tipoFertilizante') == 'Porcino' ? 'selected' : '' }}>
                        Porcino</option>
                    <option value="Reciclado" 
                        {{ old('tipoFertilizante') == 'Reciclado' ? 'selected' : '' }}>
                        Reciclado</option>
                </select>
                @error('tipoFertilizante')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin tipo de fertilizante --}}

            {{-- Responsable --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
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

        </div> {{-- Fin Row --}}

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Aplicación de Fertilizante Organico" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection