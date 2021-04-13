@extends('layouts.app')
@section('content')
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
<div class="row">
    <form action="{{ route('calidadPlanta.store') }}" method="post">
        @csrf
        <div class="row">
            <h1 class="titulo mb-5 col-12 text-center">Calidad de la Planta</h1>

            {{-- <div class="form-group col-sm-12">
                <label for="NombrePropietario">Nombre del Propietario: </label>
                <span class="font-weight-bold">Juan Pérez</span>
            </div> --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="fechaCorte">Fecha de corte de la planta</label>
                <input type="date" 
                    name="fechaCorte" id="fechaCorte" 
                    class="form-control 
                        @error('fechaCorte') is-invalid @enderror" 
                    max="{{ $fechaActual }}"
                    value="{{ old('fechaCorte') }}"
                />
                @error('fechaCorte')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
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
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="origenPlanta">Empresa o persona de donde viene la planta</label>
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
            
            <div class="form-group col-sm-12 col-md-6 mb-5">
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

            
            <div class="col-12 col-sm-12 col-md-6 mb-5 text-center">
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


            
            {{-- <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="Yemas">Yemas efectivas %</label>
                <input type="number" name="Yemas" class="form-control col-11">
                <span class="col-1">%</span>
            </div> --}}

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="lote">No. de Lote</label>
                <input type="text" name="lote" id="lote" class="form-control" value="{{ old('lote') }}">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="resistenciaPlagas">Plagas o enfermedades a las cuales es resistente</label>
                <input type="text" name="resistenciaPlagas" id="resistenciaPlagas" class="form-control" value="{{ old('resistenciaPlagas') }}">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="toleranciaPlagas">Plagas o enfermedades a las cuales es tolerante</label>
                <input type="text" name="toleranciaPlagas" id="toleranciaPlagas" class="form-control" value="{{ old('toleranciaPlagas') }}">
            </div>

            <div class="form-group col-sm-12 col-md-6 mb-5">
                <label for="certificado">No. de Certificado de la planta</label>
                <input type="text" name="certificado" id="certificado" class="form-control" value="{{ old('certificado') }}">
            </div>
        </div>
        <div class="row mb-5 justify-content-end">
            <div class="form-group">
                <input type="submit" value="Registrar Calidad de la Planta" class="btn btn-primary px-5">
            </div>
        </div>
    </form>
</div>
<a href="{{ route('main') }}" class="btn btn-success">Menú</a>
@endsection