@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="{{ route('controlPreventivo.store') }}" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Control Preventivo de Plagas y Enfermades</h1>

            <div class="col-12 alert alert-info text-center">Este modulo es para las acciones preventivas que se realizaran a las plantas que aún no han sido plantadas en ninguna sección</div>

            {{-- Lote de plantas --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="lotePlanta">No. de Lote de la Planta a tratar</label>
                <select name="lotePlanta" id="lotePlanta" class="form-control @error('lotePlanta') is-invalid @enderror">
                    <option value="" hidden>Seleccione el Lote de la planta</option>
                    @foreach ($lotes as $lote)
                        <option 
                            value="{{ $lote->id }}"
                            {{ old('lotePlanta') == $lote->id ? 'selected' : '' }} >
                        {{ $lote->lote ." Plantas: ". $lote->cantidadPlantas }}
                        </option>
                    @endforeach
                </select>
                @error('lotePlanta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Lote de plantas --}}

            {{-- Plagas a prevenir --}}
            <div class="col-12 text-center form-group mb-5">
                <div class="@error('plagas') is-invalid @enderror">Plagas a Prevenir</div>

                @foreach($plagas as $plaga)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('plagas') is-invalid @enderror" 
                            type="checkbox" 
                            value="{{ $plaga->nombrePlaga }}" 
                            id="{{ $plaga->nombrePlaga }}"
                            name="plagas[]" 
                            @if( in_array($plaga->nombrePlaga, old('plagas', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="{{ $plaga->nombrePlaga }}">
                            {{ $plaga->nombrePlaga }}
                        </label>
                    </div>
                @endforeach

                @error('plagas')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>Seleccione al menos una plaga</strong>
                </span>
            @enderror
        </div>{{-- Fin Plagas a prevenir --}}

            {{-- Fecha --}}
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaAccion">Fecha de Acción</label>
                <input type="date" 
                    name="fechaAccion" 
                    id="fechaAccion"
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaAccion') }}"
                    class="form-control 
                        @error('fechaAccion') is-invalid @enderror"
                />
                @error('fechaAccion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>{{-- Fin Fecha --}}

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="cantidadPlantas">Cantidad de Plantas tratadas</label>
                <input type="number" 
                    name="cantidadPlantas" 
                    id="cantidadPlantas"
                    value="{{ old('cantidadPlantas') }}"
                    {{-- max="{{ $lotes->cantidadPlantas }}" --}}
                    class="form-control 
                        @error('cantidadPlantas') is-invalid @enderror"
                />
                @error('cantidadPlantas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-3 col-md-2 mb-5">
                <label for="costo">Costo total</label>
                <input type="number" 
                    min="0"
                    name="costo" 
                    id="costo" 
                    @if(old('costo') != 0)
                        value="{{ old('costo') }}"
                    @else
                        value="0"
                    @endif
                    class="form-control 
                        @error('costo') is-invalid @enderror"
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ "El campo costo es obligatorio, si no hubo ningun gasto dejelo en 0"}}</strong>
                    </span>
                @enderror
            </div>

            {{-- Acción Preventiva --}}
            <div class="col-12 text-center mb-5">
                <div class="@error('accionPreventiva') is-invalid @enderror">Acción Preventiva</div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Fumigación" 
                            id="fumigacion"
                            name="accionPreventiva[]" 
                            @if( in_array('Fumigación', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="fumigacion">
                            Fumigación
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Lavado de Planta" 
                            id="lavado"
                            name="accionPreventiva[]" 
                            @if( in_array('Lavado de Planta', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="lavado">
                            Lavado de Planta
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Cambio de sustrato" 
                            id="sustrato"
                            name="accionPreventiva[]" 
                            @if( in_array('Cambio de sustrato', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="sustrato">
                            Cambio de sustrato
                        </label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input 
                            @error('accionPreventiva') is-invalid @enderror" 
                            type="checkbox" 
                            value="Otro" 
                            id="Otro"
                            name="accionPreventiva[]" 
                            @if( in_array('Otro', old('accionPreventiva', [])) )
                                checked
                            @endif
                        />
                        <label class="form-check-label" for="Otro">
                            Otro
                        </label>
                    </div>

                @error('accionPreventiva')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>Seleccione al menos una acción realizada</strong>
                    </span>
                @enderror
            </div>{{-- Fin Acción Preventiva --}}

            
            @include('srhigo.campos.responsable')

        </div>
        <div class="row justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Control Preventivo" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection