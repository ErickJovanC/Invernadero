@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <h1 class="h1 mb-5 col-12 text-center">Registro de Gastos</h1>

    {{-- Muestra el mensaje de confirmación --}}
    @if(Session::has('mensaje'))
        <div class="alert alert-info col-12 text-center">
            {!! Session::get('mensaje') !!}
        </div>
    @endif

    <form action="{{ route('gasto.store') }}" method="post" class="col-12">
        @csrf
        <div class="row">
            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4 mb-5">
                <label for="fecha">Fecha</label>
                <input type="date" 
                    name="fecha" 
                    id="fecha"
                    max="{{ $fechaActual }}"
                    value="{{ old('fecha') }}"
                    class="form-control 
                        @error('fecha') is-invalid @enderror" 
                />
                @error('fecha')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            {{-- Concepto --}}
            <div class="form-group col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <label for="concepto">Concepto</label>
                <select name="concepto" id="concepto" class="form-control @error('concepto') is-invalid @enderror">
                    <option value="" hidden>Seleccionar</option>
                    @foreach ($conceptos as $concepto)
                        <option 
                            value="{{ $concepto->id }}" 
                            {{ old('concepto') == $concepto->id ? 'selected' : '' }}
                        >
                            {{ $concepto->concepto }}
                        </option>
                    @endforeach
                </select>
                @error('concepto')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Concepto --}}

            {{-- Costo --}}
            <div class="form-group col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-5">
                <label for="costo">Costo $</label>
                <input type="text" 
                    name="costo" 
                    min="1"
                    id="costo" 
                    value="{{ old('costo') }}"
                    class="form-control @error('costo') is-invalid @enderror"
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin Costo --}}

            {{-- comentario --}}
            <div class="form-group col-12 mb-5">
                <label for="comentario">Comentario</label>
                <input type="text" 
                    name="comentario" 
                    id="comentario" 
                    value="{{ old('comentario') }}"
                    class="form-control @error('comentario') is-invalid @enderror"
                />
                @error('comentario')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div> {{-- Fin comentario --}}
        </div>

        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Gasto" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
@endsection