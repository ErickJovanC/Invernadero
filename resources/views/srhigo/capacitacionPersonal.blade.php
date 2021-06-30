@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="h1 mb-5 col-12 text-center">Capacitacion del Personal</h1>
    <form action="{{ route('capacitacionPersonal.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">
            @include('srhigo.campos.huertaSeccion')
            @include('srhigo.campos.fecha')

            {{-- Nombre del Curso --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="nombreCurso">Nombre del Curso</label>
                <input type="text" 
                    name="nombreCurso" 
                    id="nombreCurso" 
                    value="{{ old('nombreCurso') }}"
                    class="form-control @error('nombreCurso') is-invalid @enderror"
                />
                @error('nombreCurso')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin nombre del Curso --}}

            {{-- Nombre del Capacitador --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="nombreCapacitador">Nombre del Capacitador</label>
                <input type="text" 
                    name="nombreCapacitador" 
                    id="nombreCapacitador" 
                    value="{{ old('nombreCapacitador') }}"
                    class="form-control @error('nombreCapacitador') is-invalid @enderror"
                />
                @error('nombreCapacitador')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin nombre del Capacitador --}}

            {{-- Empresa Capacitadora --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="empresaCapacitadora">Empresa Capacitadora</label>
                <input type="text" 
                    name="empresaCapacitadora" 
                    id="empresaCapacitadora" 
                    value="{{ old('empresaCapacitadora') }}"
                    class="form-control @error('empresaCapacitadora') is-invalid @enderror"
                />
                @error('empresaCapacitadora')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Empresa Capacitadora --}}

            {{-- Tiempo de Capacitación --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="tiempoCapacitacion">Tiempo de Capacitación (Horas:Minutos)</label>
                <input type="text"
                    min="0"
                    name="tiempoCapacitacion" 
                    id="tiempoCapacitacion" 
                    value="{{ old('tiempoCapacitacion') }}"
                    class="form-control @error('tiempoCapacitacion') is-invalid @enderror"
                />
                @error('tiempoCapacitacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Tiempo de Capacitación --}}

            {{-- Costo de la capacitación --}}
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="costo">Costo de la capacitación (Horas:Minutos)</label>
                <input type="number"
                    min="0"
                    name="costo" 
                    id="costo" 
                    value="{{ old('costo') }}"
                    class="form-control @error('costo') is-invalid @enderror"
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Costo de la capacitación --}}
            
            <div class="col-12 mb-5">
                <div class="@error('trabajadores') is-invalid @enderror h1">Trabajadores que fueron capacitados</div>

                @foreach($trabajadores as $trabajador)
                    <div class="form-check">
                        <input class=" 
                            @error('trabajadores') is-invalid @enderror" 
                            type="checkbox" 
                            value="{{ $trabajador->nombreEmpleado ." ". $trabajador->apellidoEmpleado }}" 
                            id="{{ $trabajador->nombreEmpleado }}"
                            name="trabajadores[]" 
                            @if( in_array( $trabajador->id, old('trabajadores', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="{{ $trabajador->nombreEmpleado }}">
                            {{ $trabajador->nombreEmpleado ." ".
                            $trabajador->apellidoEmpleado ." (".
                            $trabajador->sobrenombreEmpleado .")" }}
                        </label>
                    </div>
                @endforeach

                @error('trabajadores')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione al menos un trabajor</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Capacitación" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection