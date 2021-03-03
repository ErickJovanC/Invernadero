@extends('layouts.app')
@section('content')
    <a href="{{ route('registroPersonal.index') }}" class="btn btn-success">Registro Personal</a>
    <a href="{{ route('registroPropiedad.index') }}" class="btn btn-success">Registro Propiedad</a>
    <a href="preparacionSuelo/" class="btn btn-success">Preparación del suelo</a>
    <a href="calidadPlanta/" class="btn btn-success">Calidad Planta</a>
    <a href="controlPreventivo/" class="btn btn-success">Control Preventivo</a>
    <a href="registroSiembra/" class="btn btn-success">Registro Siembra</a>
@endsection