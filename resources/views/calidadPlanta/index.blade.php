@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="{{ route('calidadPlanta.store') }}" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Recepción de Planta</h1>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="fechaCorte">Fecha de corte de la planta (esqueje)</label>
                <input type="date" 
                    name="fechaCorte" id="fechaCorte" 
                    class="form-control 
                        @error('fechaCorte') is-invalid @enderror" 
                    max="{{ $fechaCorte }}"
                    value="{{ old('fechaCorte') }}"
                />
                @error('fechaCorte')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="fechaRecepcion">Fecha en que recibe la planta</label>
                <input type="date" 
                    name="fechaRecepcion" 
                    id="fechaRecepcion" 
                    class="form-control
                        @error('fechaRecepcion') is-invalid @enderror" 
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaRecepcion') }}"
                />
                @error('fechaRecepcion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="origenPlanta">Empresa o persona de donde proviene la planta</label>
                <input type="text" 
                    name="origenPlanta" 
                    id="origenPlanta" 
                    class="form-control 
                        @error('origenPlanta') is-invalid @enderror"
                    value="{{ old('origenPlanta') }}"
                />
                @error('origenPlanta')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="cantidadPlantas">Cantidad de plantas</label>
                <input type="number" 
                    name="cantidadPlantas" id="cantidadPlantas" 
                    class="form-control 
                        @error('cantidadPlantas') is-invalid @enderror"
                    min="1"
                    value="{{ old('cantidadPlantas') }}"
                />
                @error('cantidadPlantas')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-5 text-center">
                <div class="text-center">Variedad de la Planta</div>
                <div class="form-check form-check-inline">
                    <input type="radio"
                    name="variedadPlanta"
                    id="blackMission"
                    class="form-check-input
                    @error('variedadPlanta') is-invalid @enderror"
                    value="Black Mission"
                    checked
                    />
                    <label class="form-check-label" for="blackMission">Black Mission</label>
                    @error('variedadPlanta')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="lote">No. de Lote asignado</label>
                <input type="text" name="lote" id="lote" 
                    class="form-control @error('lote') is-invalid @enderror" 
                    value="{{ old('lote') }}"
                />
                @error('lote')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="resistenciaPlagas">Plagas o enfermedades a las cuales es resistente</label>
                <input type="text" name="resistenciaPlagas" id="resistenciaPlagas" class="form-control" value="{{ old('resistenciaPlagas') }}">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="toleranciaPlagas">Plagas o enfermedades a las cuales es tolerante</label>
                <input type="text" name="toleranciaPlagas" id="toleranciaPlagas" class="form-control" value="{{ old('toleranciaPlagas') }}">
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="certificado">No. de Certificado de la planta</label>
                <input type="text" name="certificado" id="certificado" class="form-control" value="{{ old('certificado') }}">
            </div>

            <div class="form-group col-sm-12 col-md-6 col-lg-4 mb-5">
                <label for="costo">Costo total de las plantas</label>
                <input type="number" name="costo" id="costo" 
                min="0"
                step="0.5"
                max="99999.5"    
                class="form-control @error('costo') is-invalid @enderror" 
                    value="{{ old('costo') }}"
                />
                @error('costo')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            @include('srhigo.campos.responsable')

        </div>
        <div class="row mb-5 justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Recepción de Planta" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection