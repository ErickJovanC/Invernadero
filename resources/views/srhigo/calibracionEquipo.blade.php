@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="titulo mb-5 col-12 text-center">Calibración de Equipo de Aplicación</h1>
    <form action="{{ route('calibracionEquipo.store') }}" method="post" class="col-12 mb-5">
        @csrf
        <div class="row">

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaSiembra">Fecha de Acción</label>
                <input type="date" 
                    name="fechaSiembra" 
                    id="fechaSiembra"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaSiembra') }}"
                    class="form-control 
                        @error('fechaSiembra') is-invalid @enderror" 
                />
                @error('fechaSiembra')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Equipo a calibrar --}}
            <div class="col-6">
                <label for="equipo">Equipo</label>
                <input type="text" 
                    name="equipo" 
                    id="equipo" 
                    value="{{ old('equipo') }}"
                    class="form-control @error('equipo') is-invalid @enderror"
                />
                @error('equipo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Equipo a calibrar--}}
            
            <div class="col-12 is-invalid h2 text-center">Producto aplicado con el equipo: </div>
            <div class="col-12 mb-5 text-center">
                <div class="form-check form-check-inline">
                    <input 
                        type="radio" 
                        name="productoAplicado" 
                        id="Fertilizante" 
                        value="Fertilizante"
                        {{ old('productoAplicado') == 'Fertilizante' ? 'checked' :  '' }}
                        class="form-check-input @error('productoAplicado') is-invalid @enderror" 
                    />
                    <label class="form-check-label" for="productoAplicado1">Fertilizante</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('productoAplicado') is-invalid @enderror" type="radio" name="productoAplicado" id="Insecticida" value="Insecticida" {{ old('productoAplicado') == 'Insecticida' ? 'checked' :  '' }}>
                    <label class="form-check-label" for="Insecticida">Insecticida</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('productoAplicado') is-invalid @enderror" type="radio" name="productoAplicado" id="Fungicida" value="Fungicida" {{ old('productoAplicado') == 'Fungicida' ? 'checked' :  '' }}>
                    <label class="form-check-label" for="Fungicida">Fungicida</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input @error('productoAplicado') is-invalid @enderror" type="radio" name="productoAplicado" id="Herbicida" value="Herbicida" {{ old('productoAplicado') == 'Herbicida' ? 'checked' :  '' }}>
                    <label class="form-check-label" for="Herbicida">Herbicida</label>
                </div>
                @error('productoAplicado')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>No de Repetición</span>
                <br>
                <span class="h1 alert-danger">#1 Analizar el procedimiento</span>
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="volumenPesoInicial">Volumen o Peso Inicial (Kilogramos o Litros)</label>
                <input type="number" name="volumenPesoInicial" 
                value="{{ old('volumenPesoInicial') }}"
                class="form-control @error('volumenPesoInicial') is-invalid @enderror">
                @error('volumenPesoInicial')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="volumenPesoFinal">Volumen o Peso Final (Kilogramos o Litros)</label>
                <input type="number" name="volumenPesoFinal" 
                value="{{ old('volumenPesoFinal') }}"
                class="form-control @error('volumenPesoFinal') is-invalid @enderror">
                @error('volumenPesoFinal')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>Gasto del Equipo (A-B) = C</span>
                <br>
                <span class="h1">0.0</span>
            </div>

            <div class="w-100"></div>

            {{-- Longitud recorrida --}}
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="longitudRecorrida">Longitud Recorrida (metros)</label>
                <input type="number" 
                name="longitudRecorrida" 
                id="longitudRecorrida"
                value="{{ old('longitudRecorrida')}}"
                class="form-control @error('longitudRecorrida') is-invalid @enderror">
                @error('longitudRecorrida')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Longitud recorrida--}}

            {{-- Ancho Cubierto --}}
            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <label for="anchoCubierto">Ancho Cubierto (metros)</label>
                <input type="number" 
                name="anchoCubierto" 
                id="anchoCubierto"
                value="{{ old('anchoCubierto')}}"
                class="form-control @error('anchoCubierto') is-invalid @enderror">
                @error('anchoCubierto')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin  Ancho Cubierto--}}

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>Área cubierta (m<sup>2</sup>) DxE = F</span>
                <br>
                <span class="h1">0.0</span>
            </div>

            <div class="form-group col-12 col-sm-6 col-md-3 mb-5">
                <span>Gasto por Manzana (7000 x C) / F</span>
                <br>
                <span class="h1">0.0</span>
            </div>

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

        </div> {{-- Fin row --}}
        
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Calibración de Equipo" class="btn btn-primary px-5">
            </div>
        </div>

    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection